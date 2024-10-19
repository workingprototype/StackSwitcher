@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Select a Database</h3>
                </div>
                <div class="card-body">
                    <!-- Display Errors -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Display Session Error -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('select.database') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="database" class="form-label">Database:</label>
                            <select name="database" id="database" class="form-select" required>
                                @foreach($databases as $database)
                                    <option value="{{ $database->Database }}">{{ $database->Database }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Hidden fields -->
                        <input type="hidden" name="host" value="{{ $validated['host'] }}">
                        <input type="hidden" name="port" value="{{ $validated['port'] }}">
                        <input type="hidden" name="username" value="{{ $validated['username'] }}">
                        <input type="hidden" name="password" value="{{ $validated['password'] }}">

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Select Database</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
