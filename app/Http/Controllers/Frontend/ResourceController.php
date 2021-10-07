<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        return view('frontend.resources');
    }

    public function show($slug)
    {
        $resource = Resource::where('slug', $slug)->first();
        $recentResources = Resource::latest()->take(5)->get();
        $categories = Category::all();
        return view('frontend.single-resource', compact('resource', 'recentResources', 'categories'));
    }
}
