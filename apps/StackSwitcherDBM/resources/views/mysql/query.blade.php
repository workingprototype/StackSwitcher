@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <!-- Query Results Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Query Results</h3>
                </div>
                <div class="card-body">
                    <!-- Check if there are results -->
                    @if(count($results) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <!-- Display column headers -->
                                        @foreach(array_keys((array)$results[0]) as $key)
                                            <th>{{ $key }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through each result row -->
                                    @foreach($results as $row)
                                        <tr>
                                            <!-- Loop through each column value -->
                                            @foreach((array)$row as $value)
                                                <td>{{ $value }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <!-- Display message if no results -->
                        <p class="text-center text-muted">No results found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
