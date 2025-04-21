@extends('layouts.admin')

@section('content')
    <div class="container admin-container">
        <h1 class="admin-title text-center">Edit Allocation</h1>

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

        <h2 class="text-center mb-4">Update Class for {{ $member->name }}</h2>
        <form action="{{ route('admin.allocations.update', $member) }}" method="POST" class="mx-auto"
            style="max-width: 500px;">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="class_id" class="form-label">Select Class:</label>
                <select name="class_id" id="class_id" class="form-control @error('class_id') is-invalid @enderror" required>
                    <option value="" disabled>Choose a class</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->class_id }}" {{ old('class_id', $member->class_id) == $class->class_id ? 'selected' : '' }}>
                            {{ $class->class_name }} at
                            {{ date('d-m-Y H:i', strtotime($class->class_time)) }}
                        </option>
                    @endforeach
                </select>
                @error('class_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-admin-primary w-100">Update Allocation</button>
        </form>
    </div>
@endsection