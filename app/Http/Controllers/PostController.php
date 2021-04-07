<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $path = 'thumbnails';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        // return view('posts.index', ['posts' => $posts]);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thumbnail = $request->file('thumbnail');
        $fileName = $thumbnail->storeAs(
            $this->path,
            time() . '.' . $thumbnail->getClientOriginalExtension(),
            'public'
        );

        Post::create([
            'title'     => $request->title,
            'thumbnail' => $fileName,
            'content'   => $request->content
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $fileName = $post->thumbnail;
        if ($request->hasFile('thumbnail')) {
            Storage::delete('public/' . $post->thumbnail);
            $thumbnail = $request->file('thumbnail');
            $fileName = $thumbnail->storeAs(
                $this->path,
                time() . '.' . $thumbnail->getClientOriginalExtension(),
                'public'
            );
        }

        $post->update([
            'title'     => $request->title,
            'thumbnail' => $fileName,
            'content'   => $request->content
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete('public/' . $post->thumbnail);
        Post::destroy($post->id);

        return redirect()->route('posts.index');
    }
}
