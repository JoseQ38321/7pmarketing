<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Resource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $resources = Resource::where('status', 1)
                    ->orderBy('created_at', 'desc')
                    ->take(4)
                    ->get();
        $posts = Post::where('status', 1)
                    ->orderBy('created_at', 'desc')
                    ->take(4)
                    ->get();
        return view('frontend.home', compact('resources', 'posts'));
    }
}
