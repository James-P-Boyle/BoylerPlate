<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::forPublicIndex()->paginate(8);
        return view('home.welcome')->with('posts', $posts);
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        // dd($post->metaData);
        $meta = $this->getMeta($post);

        return view('home.show', [
            'post' => $post,
            'meta' => $meta
        ]);
    }

    public function about()
    {
        return view('home.about');
    }

    public function getMeta(Post $post)
    {
        $meta = [
            'title' => $post->title,
            'description' => $post->excerpt
        ];

        $metaData = $post->metaData;

        if ($metaData && $metaData->meta_title && $metaData->meta_description) {
            $meta['title'] = $metaData->meta_title;
            $meta['description'] = $metaData->meta_description;
        }

        return $meta;
    }
}

