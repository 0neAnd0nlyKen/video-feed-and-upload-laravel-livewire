@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Video Feed</h1>
    <div class="row">
        @foreach($videos as $video)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <a href="{{ route('videos.show', $video->id) }}">
                        <img src="{{ asset('storage/' . $video->thumbnail_path) }}" class="card-img-top" alt="{{ $video->title }} thumbnail">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('videos.show', $video->id) }}">{{ $video->title }}</a>
                        </h5>
                        <p class="card-text">{{ Str::limit($video->description, 80) }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <small class="text-muted">Likes: {{ $video->likes }}</small>
                        <small class="text-muted">Dislikes: {{ $video->dislikes }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $videos->links() }}
    </div>
</div>
@endsection