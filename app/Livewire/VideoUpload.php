<?php

namespace App\Livewire;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class VideoUpload extends Component
{
    use WithFileUploads;

    public $video;
    public $thumbnail;
    public $title;
    public $description;
    public $tags;

    protected $rules = [
        'video' => 'required|file|mimes:mp4,avi,mov,webm|max:51200',
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|string',
    ];

    public function submit()
    {
        $this->validate();

        $videoPath = $this->video->store('videos', 'public');
        $thumbnailPath = $this->thumbnail->store('thumbnails', 'public');

        Video::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => Auth::id(),
            'video_path' => $videoPath,
            'thumbnail_path' => $thumbnailPath,
            'tags' => $this->tags ? json_encode(explode(',', $this->tags)) : null,
        ]);

        session()->flash('message', 'Video uploaded successfully!');
        $this->reset(['video', 'thumbnail', 'title', 'description', 'tags']);
    }


    public function render()
    {
        return view('livewire.video-upload');
    }
}
