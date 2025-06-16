<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;
use App\Models\User;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id');
        $videos = [
            [
                'title' => 'Charlie bit my finger!',
                'description' => 'The classic viral video.',
                'user_id' => $users[0] ?? 1,
                'video_path' => 'videos/Charlie bit my finger! ORIGINAL.mp4',
                'thumbnail_path' => 'thumbnails/Charlie bit my finger! ORIGINAL.jpeg',
                'views' => 1000000000,
                'likes' => 1000,
                'dislikes' => 10,
                'tags' => json_encode(['funny']),
            ],
            [
                'title' => 'Crazy Frog - Axel F',
                'description' => 'Official Crazy Frog video.',
                'user_id' => $users[1] ?? 1,
                'video_path' => 'videos/Crazy Frog - Axel F (Official Video).mp4',
                'thumbnail_path' => 'thumbnails/Crazy Frog - Axel F (Official Video).jpeg',
                'views' => 1000000000,
                'likes' => 2000,
                'dislikes' => 20,
                'tags' => json_encode(['music', 'funny']),
            ],
            [
                'title' => 'Nyan Cat!',
                'description' => 'Nyan Cat official video.',
                'user_id' => $users[2] ?? 1,
                'video_path' => 'videos/Nyan Cat! [Official].mp4',
                'thumbnail_path' => 'thumbnails/Nyan Cat! [Official].png',
                'views' => 1000000000,
                'likes' => 3000,
                'dislikes' => 30,
                'tags' => json_encode(['music']),
            ],
            [
                'title' => 'PSY - GANGNAM STYLE',
                'description' => 'The most viewed video of its time.',
                'user_id' => $users[3] ?? 1,
                'video_path' => 'videos/PSY - GANGNAM STYLE(강남스타일) M_V.mp4',
                'thumbnail_path' => 'thumbnails/PSY - GANGNAM STYLE(강남스타일) M_V.jpeg',
                'views' => 1000000000,
                'likes' => 4000,
                'dislikes' => 40,
                'tags' => json_encode(['music']),
            ],
        ];
        foreach ($videos as $video) {
            Video::factory()->create($video);
        }
    }
}