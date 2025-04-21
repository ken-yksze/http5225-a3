@extends('layouts.admin')

@section('content')
    <div class="container admin-container">
        <h1 class="admin-title">Edit Class</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.classes.update', $class) }}" class="admin-form">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="class_name" class="form-label">Class Name:</label>
                <input type="text" class="form-control @error('class_name') is-invalid @enderror" id="class_name"
                    name="class_name" value="{{ old('class_name', $class->class_name) }}" required>
                @error('class_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="class_time" class="form-label">Class Time:</label>
                <input type="datetime-local" class="form-control @error('class_time') is-invalid @enderror" id="class_time"
                    name="class_time" value="{{ old('class_time', $class->class_time) }}" required>
                @error('class_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="video_id" class="form-label">YouTube Video ID:</label>
                <input type="text" class="form-control @error('video_id') is-invalid @enderror" id="video_id"
                    name="video_id" value="{{ old('video_id', $class->video_id) }}">
                @error('video_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-admin-primary">Update Class</button>
        </form>
    </div>
@endsection