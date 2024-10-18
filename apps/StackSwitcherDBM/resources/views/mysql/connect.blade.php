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
    <label>Host:</label>
    <input type="text" name="host" required>
    <label>Port:</label>
    <input type="text" name="port" value="3306" required>
    <label>Username:</label>
    <input type="text" name="username" required>
    <label>Password:</label>
    <input type="password" name="password">
    <button type="submit">Connect</button>
</form>