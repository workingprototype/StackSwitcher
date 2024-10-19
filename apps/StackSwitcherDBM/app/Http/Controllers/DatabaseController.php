<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class DatabaseController extends Controller
{
    // Show connection form
    public function index()
    {
        // Supported drivers
        $drivers = ['mysql', 'sqlite', 'pgsql', 'mongodb', 'mariadb', 'innodb', 'cassandra'];
        return view('mysql.connect', compact('drivers'));
    }

    // Connect to the selected database
    public function connect(Request $request)
    {
        $validated = $request->validate([
            'driver' => 'required|in:mysql,sqlite,pgsql,mongodb,mariadb,innodb,cassandra',
            'host' => 'required_if:driver,mysql,pgsql,mariadb,innodb,cassandra',
            'port' => 'required_if:driver,mysql,pgsql,mariadb,innodb,cassandra|numeric',
            'username' => 'required_if:driver,mysql,pgsql,mariadb,innodb,cassandra',
            'password' => 'nullable',
        ]);

        try {
            $databaseConfig = $this->getDatabaseConfig($validated);
            
            // Update the database configuration dynamically
            config(['database.connections.temp' => $databaseConfig]);

            DB::purge('temp');
            DB::setDefaultConnection('temp');

            // Test the connection by fetching databases or tables based on driver
            $databases = $this->getDatabasesOrCollections($validated['driver']);

            return view('mysql.database', compact('databases', 'validated'));

        } catch (\Exception $e) {
            Log::error('Database Connection Error: ' . $e->getMessage());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Select the database and show tables
    public function selectDatabase(Request $request)
    {
        $validated = $request->validate([
            'database' => 'required',
            'driver' => 'required|in:mysql,sqlite,pgsql,mongodb,mariadb,innodb,cassandra',
            'host' => 'required_if:driver,mysql,pgsql,mariadb,innodb,cassandra',
            'port' => 'required_if:driver,mysql,pgsql,mariadb,innodb,cassandra|numeric',
            'username' => 'required_if:driver,mysql,pgsql,mariadb,innodb,cassandra',
            'password' => 'nullable',
        ]);

        try {
            // Update connection config to selected database
            config(['database.connections.temp' => $this->getDatabaseConfig($validated, $validated['database'])]);

            DB::setDefaultConnection('temp');
            $tables = $this->getTables($validated['driver']);

            return view('mysql.tables', compact('tables', 'validated'));

        } catch (\Exception $e) {
            Log::error('Database Selection Error: ' . $e->getMessage());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Run the query
    public function runQuery(Request $request)
    {
        $validated = $request->validate([
            'database' => 'required',
            'query' => 'required',
            'driver' => 'required|in:mysql,sqlite,pgsql,mongodb,mariadb,innodb,cassandra',
            'host' => 'required_if:driver,mysql,pgsql,mariadb,innodb,cassandra',
            'port' => 'required_if:driver,mysql,pgsql,mariadb,innodb,cassandra|numeric',
            'username' => 'required_if:driver,mysql,pgsql,mariadb,innodb,cassandra',
            'password' => 'nullable',
        ]);

        try {
            config(['database.connections.temp' => $this->getDatabaseConfig($validated, $validated['database'])]);

            DB::setDefaultConnection('temp');
            $results = DB::select($validated['query']);

            return view('mysql.query', compact('results', 'validated'));

        } catch (\Exception $e) {
            Log::error('Query Execution Error: ' . $e->getMessage());
            return back()->with('error', 'Query Error: ' . $e->getMessage());
        }
    }

    // Get dynamic config based on selected driver
    private function getDatabaseConfig($validated, $database = null)
    {
        switch ($validated['driver']) {
            case 'mysql':
            case 'mariadb':
            case 'innodb':
                return [
                    'driver' => 'mysql',
                    'host' => $validated['host'],
                    'port' => $validated['port'],
                    'database' => $database,
                    'username' => $validated['username'],
                    'password' => $validated['password'],
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                    'prefix' => '',
                    'strict' => false,
                    'engine' => null,
                ];
            case 'pgsql':
                return [
                    'driver' => 'pgsql',
                    'host' => $validated['host'],
                    'port' => $validated['port'],
                    'database' => $database,
                    'username' => $validated['username'],
                    'password' => $validated['password'],
                    'charset' => 'utf8',
                    'prefix' => '',
                    'schema' => 'public',
                    'sslmode' => 'prefer',
                ];
            case 'sqlite':
                return [
                    'driver' => 'sqlite',
                    'database' => database_path($database ?: 'database.sqlite'),
                    'prefix' => '',
                ];
            case 'mongodb':
                return [
                    'driver' => 'mongodb',
                    'host' => $validated['host'],
                    'port' => $validated['port'],
                    'database' => $database,
                    'username' => $validated['username'],
                    'password' => $validated['password'],
                    'options' => ['database' => $database], // MongoDB specific
                ];
            case 'cassandra':
                return [
                    'driver' => 'cassandra',
                    'host' => $validated['host'],
                    'port' => $validated['port'],
                    'keyspace' => $database,
                    'username' => $validated['username'],
                    'password' => $validated['password'],
                ];
            default:
                throw new \Exception('Unsupported driver');
        }
    }

    // Get databases or collections
    private function getDatabasesOrCollections($driver)
    {
        if (in_array($driver, ['mysql', 'mariadb', 'pgsql', 'innodb'])) {
            return DB::select('SHOW DATABASES');
        } elseif ($driver == 'mongodb') {
            return DB::connection()->getMongoClient()->listDatabases();
        } elseif ($driver == 'cassandra') {
            return DB::select('SELECT keyspace_name FROM system_schema.keyspaces');
        } else {
            return ['database.sqlite']; // For SQLite
        }
    }

    // Get tables for a given driver
    private function getTables($driver)
    {
        if (in_array($driver, ['mysql', 'mariadb', 'pgsql', 'innodb'])) {
            return DB::select('SHOW TABLES');
        } elseif ($driver == 'mongodb') {
            return DB::connection()->getMongoClient()->listCollections();
        } elseif ($driver == 'cassandra') {
            return DB::select('SELECT table_name FROM system_schema.tables');
        } else {
            return ['sqlite_master']; // SQLite table equivalent
        }
    }
}
