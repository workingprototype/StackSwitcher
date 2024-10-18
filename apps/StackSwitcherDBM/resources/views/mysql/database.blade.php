<h3>Select a Database</h3>
<form action="{{ route('select.database') }}" method="POST">
    @csrf
    <label>Database:</label>
    <select name="database" required>
        @foreach($databases as $database)
            <option value="{{ $database->Database }}">{{ $database->Database }}</option>
        @endforeach
    </select>
    <input type="hidden" name="host" value="{{ $validated['host'] }}">
    <input type="hidden" name="port" value="{{ $validated['port'] }}">
    <input type="hidden" name="username" value="{{ $validated['username'] }}">
    <input type="hidden" name="password" value="{{ $validated['password'] }}">
    <button type="submit">Select</button>
</form>
