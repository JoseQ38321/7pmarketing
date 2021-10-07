<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        return view('frontend.blog');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $recentPosts = Post::latest()->take(5)->get();
        $categories = Category::all();
        return view('frontend.single-blog', compact('post', 'recentPosts', 'categories'));
    }
}
