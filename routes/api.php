<?php

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