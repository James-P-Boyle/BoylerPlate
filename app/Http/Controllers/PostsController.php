<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\CloudinaryUploader;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PostFormRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::forPublicIndex()
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
        DB::beginTransaction();

        $post = Post::create(array_merge($request->all(), [
            'user_id' => auth()->user()->id,
            'image_path' => $this->storeImage($request)
        ]));

        if ($request->filled('meta_title') || $request->filled('meta_description')) {
            $post->metaData()->save(new MetaData([
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description
            ]));
        }

        $tags = explode(',', $request->tags);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag->id);
        }

        DB::commit();

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
        // dd($request->all());

        $post = Post::findOrFail($id);

        $post->update($request->all());

        $post->metaData->update($request->all());

        /*MetaData::where('post_id', $id)->update([
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description
        ]);*/

        // foreach ($post->tags as $tagName) {
        //     $tag = Tag::firstOrCreate(['name' => $tagName]);
        //     $post->tags()->attach($tag->id);
        // }

        return redirect(route('dashboard.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);

        return redirect(route('dashboard.index'))->with('message', 'Post has been deleted');
    }

    private function storeImage($request): String
    {
        $image = $request->file('image');

        $uploader = new CloudinaryUploader();
        return $uploader->upload($image);
    }
}
