<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();
        $posts = Post::where('user_id', $user_id)->with('tags')->orderBy('updated_at', 'desc')->paginate(8);
        return view('admin.dashboard')->with('posts', $posts);
    }
}
