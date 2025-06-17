<?php

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/upload/video', function (Request $request) {
    $request->validate([
        'video' => 'required|file|mimes:mp4,avi,mov,webm|max:51200', // 50MB max
    ]);
    $path = $request->file('video')->store('videos', 'public');
    return response()->json(['path' => $path, 'url' => Storage::url($path)]);
});

Route::post('/upload/thumbnail', function (Request $request) {
    $request->validate([
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max
    ]);
    $path = $request->file('thumbnail')->store('thumbnails', 'public');
    return response()->json(['path' => $path, 'url' => Storage::url($path)]);
});

Route::post('/videos', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'user_id' => 'required|exists:users,id',
        'video_path' => 'required|string',
        'thumbnail_path' => 'nullable|string',
        'likes' => 'nullable|integer',
        'dislikes' => 'nullable|integer',
        'tags' => 'nullable|array',
    ]);
    if (isset($data['tags']) && is_array($data['tags'])) {
        $data['tags'] = json_encode($data['tags']);
    }
    $video = Video::create($data);
    return response()->json($video, 201);
});