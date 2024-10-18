<h3>Tables in Database</h3>
<ul>
    @foreach($tables as $table)
        <li>{{ $table->{"Tables_in_" . $validated['database']} }}</li>
    @endforeach
</ul>

<h3>Run a Query</h3>
<form action="{{ route('run.query') }}" method="POST">
    @csrf
    <textarea name="query" rows="5" cols="50" required>SELECT * FROM table_name</textarea>
    <input type="hidden" name="database" value="{{ $validated['database'] }}">
    <input type="hidden" name="host" value="{{ $validated['host'] }}">
    <input type="hidden" name="port" value="{{ $validated['port'] }}">
    <input type="hidden" name="username" value="{{ $validated['username'] }}">
    <input type="hidden" name="password" value="{{ $validated['password'] }}">
    <button type="submit">Run Query</button>
</form>
