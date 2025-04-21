@extends('layouts.admin')

@section('content')
    <div class="container admin-container">
        <h1 class="admin-title text-center">Members</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-hover admin-table">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Current Class</th>
                    <th>Class Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ ucfirst($member->role) }}</td>
                        <td>
                            @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="Member Image"
                                    style="width:100px;height:100px;" class="img-thumbnail">
                            @else
                                <img src="{{ asset('images/instructors/no-image.png') }}" alt="No Image Available"
                                    style="width:100px;height:100px;" class="img-thumbnail">
                            @endif
                        </td>
                        <td>{{ $member->class ? $member->class->class_name : 'No class assigned' }}</td>
                        <td>{{ $member->class ? date('d-m-Y H:i', strtotime($member->class->class_time)) : 'N/A' }}</td>
                        <td>
                            <div class="btn-group gap-1" role="group">
                                @if(!$member->class)
                                    <a href="{{ route('admin.allocations.create', ['member_id' => $member->member_id]) }}"
                                        class="btn btn-admin-primary btn-sm">Assign</a>
                                @else
                                    <a href="{{ route('admin.allocations.edit', $member) }}"
                                        class="btn btn-admin-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.allocations.destroy', $member) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-admin-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this allocation?');">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection