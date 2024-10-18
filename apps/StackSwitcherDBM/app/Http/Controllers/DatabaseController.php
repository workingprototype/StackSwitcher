<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class DatabaseController extends Controller
{
    public function index()
    {
        return view('mysql.connect');
    }

    public function connect(Request $request)
{
    $validated = $request->validate([
        'host' => 'required',
        'port' => 'required|numeric',
        'username' => 'required',
        'password' => 'nullable',
    ]);

    try {
        // Temporarily change the database connection config
        config([
            'database.connections.temp_mysql' => [
                'driver' => 'mysql',
                'host' => $validated['host'],
                'port' => $validated['port'],
                'database' => null,
                'username' => $validated['username'],
                'password' => $validated['password'],
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => false,
                'engine' => null,
            ]
        ]);

        // Purge the default connection and set to temp_mysql
        DB::purge('mysql');
        DB::setDefaultConnection('temp_mysql');

        // Test the connection by fetching databases
        $databases = DB::select('SHOW DATABASES');

        return view('mysql.database', compact('databases', 'validated'));

    } catch (\Exception $e) {
        // Log and show the exact error message
        Log::error('MySQL Connection Error: ' . $e->getMessage());

        return back()->with('error', 'MySQL Error: ' . $e->getMessage());
    }
}


    public function selectDatabase(Request $request)
    {
        // Log the received input for debugging
        Log::info('Received data: ', $request->all());
        
        $validated = $request->validate([
            'database' => 'required',
            'host' => 'required',
            'port' => 'required|numeric',
            'username' => 'required',
            'password' => 'nullable',
        ]);

        try {
            // Update connection to the selected database
            config([
                'database.connections.temp_mysql' => [
                    'driver' => 'mysql',
                    'host' => $validated['host'],
                    'port' => $validated['port'],
                    'database' => $validated['database'],
                    'username' => $validated['username'],
                    'password' => $validated['password'],
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                    'prefix' => '',
                    'strict' => false,
                    'engine' => null,
                ]
            ]);
            
            DB::setDefaultConnection('temp_mysql');

            // Fetch tables
            $tables = DB::select('SHOW TABLES');

            return view('mysql.tables', compact('tables', 'validated'));

        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Database Selection Error: ' . $e->getMessage());

            // Show an error message on the page
            return back()->with('error', 'Could not select the database. Please try again.');
        }
    }

    public function runQuery(Request $request)
    {
        $validated = $request->validate([
            'database' => 'required',
            'query' => 'required',
            'host' => 'required',
            'port' => 'required|numeric',
            'username' => 'required',
            'password' => 'nullable',
        ]);

        try {
            // Set the connection to the selected database
            config([
                'database.connections.temp_mysql' => [
                    'driver' => 'mysql',
                    'host' => $validated['host'],
                    'port' => $validated['port'],
                    'database' => $validated['database'],
                    'username' => $validated['username'],
                    'password' => $validated['password'],
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                    'prefix' => '',
                    'strict' => false,
                    'engine' => null,
                ]
            ]);
            
            DB::setDefaultConnection('temp_mysql');
    
            // Execute the user-provided query
            $results = DB::select($validated['query']);
    
            return view('mysql.query', compact('results', 'validated'));
    
        } catch (\Exception $e) {
            // Log and show the exact error message
            Log::error('Query Execution Error: ' . $e->getMessage());
    
            return back()->with('error', 'The query execution failed: ' . $e->getMessage());
        }
    }
}