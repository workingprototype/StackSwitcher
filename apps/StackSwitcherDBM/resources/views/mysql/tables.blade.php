@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <!-- Display Tables/Collections in the Database -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h3>{{ ucfirst($validated['driver']) == 'mongodb' ? 'Collections' : 'Tables' }} in Database: <strong>{{ $validated['database'] }}</strong></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ ucfirst($validated['driver']) == 'mongodb' ? 'Collection' : 'Table' }} Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tables as $table)
                                <tr>
                                    <td>
                                        {{ isset($table->{"Tables_in_" . $validated['database']}) ? $table->{"Tables_in_" . $validated['database']} : (isset($table->name) ? $table->name : $table) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Run a Query Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Run a Query</h3>
                </div>
                <div class="card-body">
                    <!-- Query Form -->
                    <form action="{{ route('run.query') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="query" class="form-label">Query:</label>
                            <textarea name="query" id="query" class="form-control" rows="5" required>{{ $validated['driver'] == 'mongodb' ? 'db.' . $validated['database'] . '.find()' : 'SELECT * FROM table_name' }}</textarea>
                        </div>

                        <input type="hidden" name="database" value="{{ $validated['database'] }}">
                        <input type="hidden" name="host" value="{{ $validated['host'] }}">
                        <input type="hidden" name="port" value="{{ $validated['port'] }}">
                        <input type="hidden" name="username" value="{{ $validated['username'] }}">
                        <input type="hidden" name="password" value="{{ $validated['password'] }}">
                        <input type="hidden" name="driver" value="{{ $validated['driver'] }}">

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Run Query</button>
                        </div>

                        <!-- Display Validation Errors -->
                        @if($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Display Session Errors -->
                        @if(session('error'))
                            <div class="alert alert-danger mt-3">
                                <p>{{ session('error') }}</p>
                            </div>
                        @endif

                        <!-- Display Success Messages -->
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
