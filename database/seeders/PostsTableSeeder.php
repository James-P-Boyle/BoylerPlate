<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Post One',
                'excerpt' => 'Summary of post One',
                'body' => 'Body of post One',
                'image_path' => 'EMPTY',
                'is_published' => false,
                'min_to_read' => 2
            ],
            [
                'title' => 'Post two',
                'excerpt' => 'Summary of post two',
                'body' => 'Body of post two',
                'image_path' => 'EMPTY',
                'is_published' => false,
                'min_to_read' => 2
            ],
        ];

        foreach($posts as $key => $value) {
            Post::create($value);
        }
    }
}
