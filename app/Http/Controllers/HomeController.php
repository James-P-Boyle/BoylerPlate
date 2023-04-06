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
        return view('home.show', [
            'post' => Post::findOrFail($id)
        ]);
    }

    public function about()
    {
        return view('home.about');
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