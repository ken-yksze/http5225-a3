@extends('layouts.app')

@section('content')
    <h1>Assigned Class Members</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Class Name</th>
                    <th>Class Time</th>
                    <th>Class Video</th>
                </tr>
            </thead>
            <tbody>
                @if($members->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">No assigned members found.</td>
                    </tr>
                @else
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
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
                            <td>{{ $member->class->class_name ?? 'No Class' }}</td>
                            <td>{{ $member->class ? date('d-m-Y H:i', strtotime($member->class->class_time)) : 'No Time' }}</td>
                            <td>
                                @if($member->class && $member->class->video_id)
                                    <div class="ratio ratio-16x9" style="max-width: 200px;">
                                        <iframe src="https://www.youtube.com/embed/{{ $member->class->video_id }}"
                                            allowfullscreen></iframe>
                                    </div>
                                @else
                                    <span class="text-muted">No Video</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection