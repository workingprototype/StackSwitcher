<h3>Query Results</h3>
@if(count($results) > 0)
    <table border="1">
        <thead>
            <tr>
                @foreach(array_keys((array)$results[0]) as $key)
                    <th>{{ $key }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($results as $row)
                <tr>
                    @foreach((array)$row as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No results found</p>
@endif
