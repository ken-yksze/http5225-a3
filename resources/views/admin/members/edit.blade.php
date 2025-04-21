@extends('layouts.admin')

@section('content')
    <div class="container admin-container">
        <h1 class="admin-title">Edit Member</h1>

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

        <form method="POST" action="{{ route('admin.members.update', $member) }}" enctype="multipart/form-data"
            class="admin-form">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $member->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email', $member->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                    <option value="student" {{ old('role', $member->role) == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="instructor" {{ old('role', $member->role) == 'instructor' ? 'selected' : '' }}>Instructor
                    </option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @if($member->image)
                    <img src="{{ asset('storage/' . $member->image) }}" alt="Current Image" class="mt-2"
                        style="max-width: 100px;">
                @endif
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-admin-primary">Update Member</button>
        </form>
    </div>
@endsection