@extends('layouts.admin')

@section('content')
    <div class="container admin-container">
        <h1 class="admin-title text-center">Assign Member to a Class</h1>

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

        @if($member)
            <h2 class="text-center mb-4">Assign {{ $member->name }} to a Class</h2>
            <form action="{{ route('admin.allocations.store') }}" method="POST" class="mx-auto" style="max-width: 500px;">
                @csrf
                <input type="hidden" name="member_id" value="{{ $member->member_id }}">
                <div class="mb-3">
                    <label for="class_id" class="form-label">Select Class:</label>
                    <select name="class_id" id="class_id" class="form-control @error('class_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Choose a class</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->class_id }}">{{ $class->class_name }} at
                                {{ date('d-m-Y H:i', strtotime($class->class_time)) }}
                            </option>
                        @endforeach
                    </select>
                    @error('class_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-admin-primary w-100">Assign</button>
            </form>
        @else
            <p class="text-center">Member not found.</p>
        @endif
    </div>

    <style>
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23333' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 12px 12px;
            padding-right: 2rem !important;
        }
    </style>
@endsection