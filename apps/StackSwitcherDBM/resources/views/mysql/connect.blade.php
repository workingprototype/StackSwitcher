@extends('layouts.app')

<!-- Error Handling and Alerts -->
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

<!-- Form with Bootstrap Styling -->
<form action="{{ route('connect') }}" method="POST" class="bg-white p-4 rounded shadow-sm mt-4">
    @csrf
    <h2 class="text-center mb-4">Connect to MySQL</h2>

    <div class="mb-3">
        <label for="host" class="form-label">Host:</label>
        <input type="text" id="host" name="host" class="form-control @error('host') is-invalid @enderror" required>
        @error('host')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="port" class="form-label">Port:</label>
        <input type="text" id="port" name="port" value="3306" class="form-control @error('port') is-invalid @enderror" required>
        @error('port')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" required>
        @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Connect</button>
    </div>
</form>
