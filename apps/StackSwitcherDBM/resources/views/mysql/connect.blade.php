@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h3>Connect to any type of database</h3>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <form action="{{ route('connect') }}" method="POST">
                @csrf

                <!-- Select Database Driver -->
                <div class="mb-3">
                    <label for="driver" class="form-label">Database Type:</label>
                    <select name="driver" id="driver" class="form-control" required>
                        @foreach($drivers as $driver)
                            <option value="{{ $driver }}">{{ ucfirst($driver) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Common Fields -->
                <div id="host-port-fields">
                    <div class="mb-3">
                        <label for="host" class="form-label">Host:</label>
                        <input type="text" name="host" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="port" class="form-label">Port:</label>
                        <input type="text" name="port" class="form-control" required>
                    </div>
                </div>

                <!-- Credentials -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Connect</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
