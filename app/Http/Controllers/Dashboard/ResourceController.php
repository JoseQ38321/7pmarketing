<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\File;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:resource.index')->only('index');
        $this->middleware('can:resource.store')->only('store');
        $this->middleware('can:resource.edit')->only('edit');
        $this->middleware('can:resource.update')->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.resources.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.resources.create', compact('categories'));
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

        $resource = Resource::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'content' => $request->content,
            'status' => $request->status,
            'user_id' => auth()->user()->id,
        ]);
        $resource->categories()->sync($request->categories);

        $path = $request->image;
        $image = File::where('file_path', $path)->first();
        $resource->image()->sync($image->id);

        $request->session()->flash('flash.banner', 'Recurso creado exitosamente');

        return redirect()->route('resource.edit', $resource);
    }

    public function edit(Resource $resource)
    {
        $categories = Category::all();
        return view('dashboard.resources.edit', compact('resource', 'categories'));
    }

    public function update(Request $request, Resource $resource)
    {
        /* return $request->all(); */
        $this->validate($request, [
            'title' => 'required',
            'abstract' => 'required',
            'content' => 'required',
            'categories' => 'required|array'
        ]);

        $resource->update([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'content' => $request->content,
            'status' => $request->status
        ]);

        $resource->categories()->sync($request->categories);

        if ($request->image) {
            $path = $request->image;
            $image = File::where('file_path', $path)->first();
            $resource->image()->sync($image->id);
        }

        $request->session()->flash('flash.banner', 'Recurso actualizado exitosamente');

        return redirect()->route('resource.edit', $resource);
    }
}
