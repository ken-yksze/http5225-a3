@extends('layouts.admin')

@section('content')
    <div class="container admin-container">
        <h1 class="admin-title text-center">Admin Dashboard</h1>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Members</h5>
                        <p class="card-text display-4">{{ $total_members }}</p>
                        <a href="{{ route('admin.members') }}" class="btn btn-admin-primary">View Members</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Classes</h5>
                        <p class="card-text display-4">{{ $total_classes }}</p>
                        <a href="{{ route('admin.classes') }}" class="btn btn-admin-primary">View Classes</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quick Actions</h5>
                        <a href="{{ route('admin.members.create') }}" class="btn btn-admin-primary">Add New Member</a>
                        <a href="{{ route('admin.classes.create') }}" class="btn btn-admin-primary">Add New Class</a>
                        <a href="{{ route('admin.allocations') }}" class="btn btn-admin-primary">Assign Member to Class</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Activity</h5>
                        <ul class="list-group">
                            @if($recent_member)
                                <li class="list-group-item">Last member added: {{ $recent_member->name }} at
                                    {{ $recent_member->created_at }}</li>
                            @endif
                            @if($recent_class)
                                <li class="list-group-item">Last class created: {{ $recent_class->class_name }} at
                                    {{ date('d-m-Y H:i', strtotime($recent_class->class_time)) }} on
                                    {{ $recent_class->created_at }}</li>
                            @endif
                            @if($recent_assignment)
                                <li class="list-group-item">Last assignment: {{ $recent_assignment->member_name }} to
                                    {{ $recent_assignment->class_name }} at {{ $recent_assignment->created_at }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection