@extends('layouts.admin')

@section('content')
    <div class="container admin-container">
        <h1 class="admin-title">Classes</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="text-center mb-4">
            <a href="{{ route('admin.classes.create') }}" class="btn btn-admin-primary">Add New Class</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover admin-table">
                <thead class="table-dark">
                    <tr>
                        <th>Class Name</th>
                        <th>Class Time</th>
                        <th>YouTube Video</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $class)
                        <tr>
                            <td>{{ $class->class_name }}</td>
                            <td>{{ date('d-m-Y H:i', strtotime($class->class_time)) }}</td>
                            <td>
                                @if($class->video_id)
                                    <div class="ratio ratio-16x9" style="max-width: 200px;">
                                        <iframe src="https://www.youtube.com/embed/{{ $class->video_id }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </div>
                                @else
                                    <span class="text-muted">No Video</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.classes.edit', $class) }}"
                                    class="btn btn-admin-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.classes.destroy', $class) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-admin-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this class?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection