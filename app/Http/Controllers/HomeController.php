<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->orderBy('updated_at', 'desc')->paginate(8);
        return view('home.welcome')->with('posts', $posts);
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $meta = $this->generateMetaContent($post);

        return view('home.show', [
            'post' => $post,
            'meta' => $meta
        ]);
    }

    public function about()
    {
        return view('home.about');
    }

    public function generateMetaContent($post)
    {
        $meta = [
            'title' => $post->title,
            'description' => $post->excerpt
        ];
        return $meta;
    }
}

/*
    public function show(string $id)
    {
        return view('blog.show', [
            'post' => Post::findOrFail($id)
        ]);
    }
*/