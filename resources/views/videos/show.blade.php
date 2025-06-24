@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <video class="w-100 mb-3" controls poster="{{ asset('storage/' . $video->thumbnail_path) }}">
                <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="col-md-4">
            <h2>{{ $video->title }}</h2>
            <p>{{ $video->description }}</p>
            <div class="mb-2">
                <span class="badge bg-success">Likes: {{ $video->likes }}</span>
                <span class="badge bg-danger">Dislikes: {{ $video->dislikes }}</span>
            </div>
            @if($video->tags)
                <div class="mb-2">
                    @foreach(is_array($video->tags) ? $video->tags : json_decode($video->tags, true) as $tag)
                        <span class="badge bg-secondary">{{ $tag }}</span>
                    @endforeach
                </div>
            @endif
            <div class="text-muted">Uploaded by: {{ $video->user->name ?? 'Unknown' }}</div>
        </div>
    </div>
</div>
@endsection