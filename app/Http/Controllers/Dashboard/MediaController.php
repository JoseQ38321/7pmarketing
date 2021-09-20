<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        return view('dashboard.media.index');
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $images = $file->store('media');
    }
}
