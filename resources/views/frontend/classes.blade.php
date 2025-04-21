@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Our Classes</h1>
    <div class="row">
        @foreach($classes as $class)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $class->class_name }}</h5>
                        <p class="card-text">
                            <strong>Time:</strong> {{ date('d-m-Y H:i', strtotime($class->class_time)) }}
                        </p>
                        <a target="_blank" href="https://www.youtube.com/watch?v={{ $class->video_id }}"
                            class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection