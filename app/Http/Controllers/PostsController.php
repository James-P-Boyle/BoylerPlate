<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PostFormRequest;
use App\Models\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('tags')
            ->orderBy('updated_at', 'desc')
            ->paginate(8);
        return view('blog.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        $request->validated();

        $post = Post::create([
            'title'=> $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
            'is_published' => $request->is_published === 'on',
            'min_to_read' => $request->min_to_read,
            'user_id' => auth()->user()->id
        ]);

        $tags = explode(',', $request->tags);
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag->id);
        }

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('blog.show', [
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('blog.edit', [
            'post' => Post::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, string $id)
    {
        $request->validated();

        Post::where('id', $id)->update($request->except([
            '_token', 'method'
        ]));

        // foreach ($post->tags as $tagName) {
        //     $tag = Tag::firstOrCreate(['name' => $tagName]);
        //     $post->tags()->attach($tag->id);
        // }

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);

        return redirect(route('dashboard.index'))->with('message', 'Post has been deleted');
    }

    private function storeImage($request)
    {
        $image = $request->file('image');

        $newImageName = uniqid() . '-' . $request->title . '.' . $image->getClientOriginalExtension();

        $img = Image::make($image->path());

        $img->fit(900, 440, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $img->save(public_path('images/' . $newImageName), 75);

        return $newImageName;
    }
}
