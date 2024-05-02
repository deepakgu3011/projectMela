@extends('layouts1.app')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@push('title')
    <title>Admin Page</title>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Admin Page</h2>
                <a href="{{ route('projects.create') }}" class="btn btn-primary">Upload New Project</a>
                <div class="mt-3">
                    <h3>Your Projects:</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th> <!-- Assuming you might want actions like Edit/Delete -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->description }}</td>
                                <td>
                                    <!-- Example Actions -->
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-info disabled" >Edit</a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger disabled" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            // Wait for 5 seconds then hide the alert message
            setTimeout(function() {
                $('#alertMessage').fadeOut('slow');
            }, 5000); // 5000 milliseconds = 5 seconds
        });
    </script>
@endsection
