<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        return view('dashboard.media.index');
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');

        File::create([
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'file_type' => $file->getMimeType(),
            'file_path' => $file->store('media'),
        ]);
    }
}
