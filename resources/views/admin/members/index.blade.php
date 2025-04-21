@extends('layouts.admin')

@section('content')
    <div class="container admin-container">
        <h1 class="admin-title text-center">Members</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="text-center mb-4">
            <a href="{{ route('admin.members.create') }}" class="btn btn-admin-primary">Add New Member</a>
        </div>

        <table class="table table-striped table-hover admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ ucfirst($member->role) }}</td>
                        <td>
                            @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="Instructor Image"
                                    style="width:100px;height:100px;">
                            @else
                                <img src="{{ asset('images/instructors/no-image.png') }}" alt="No Image Available"
                                    style="width:100px;height:100px;">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.members.edit', $member) }}" class="btn btn-admin-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.members.destroy', $member) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-admin-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection