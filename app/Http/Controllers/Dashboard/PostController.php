<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\File;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:post.index')->only('index');
        $this->middleware('can:post.store')->only('store');
        $this->middleware('can:post.edit')->only('edit');
        $this->middleware('can:post.update')->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'abstract' => 'required',
            'content' => 'required',
            'categories' => 'required|array',
            'image' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'content' => $request->content,
            'status' => $request->status,
            'user_id' => auth()->user()->id,
        ]);
        $post->categories()->sync($request->categories);

        $path = $request->image;
        $image = File::where('file_path', $path)->first();
        $post->image()->sync($image->id);

        $request->session()->flash('flash.banner', 'Post creado exitosamente');

        return redirect()->route('post.edit', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
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
        /* return $request->all(); */
        $this->validate($request, [
            'title' => 'required',
            'abstract' => 'required',
            'content' => 'required',
            'categories' => 'required|array'
        ]);

        $post->update([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'content' => $request->content,
            'status' => $request->status
        ]);

        $post->categories()->sync($request->categories);

        if ($request->image) {
            $path = $request->image;
            $image = File::where('file_path', $path)->first();
            $post->image()->sync($image->id);
        }

        $request->session()->flash('flash.banner', 'Post actualizado exitosamente');

        return redirect()->route('post.edit', $post);
    }
}
