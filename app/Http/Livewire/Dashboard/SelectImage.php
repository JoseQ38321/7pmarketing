<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class SelectImage extends Component
{
    protected $listeners = ['mediaUploaded' => '$refresh'];

    public $showFile = false;
    public $fileName;
    public $filePath;
    public $search;

    public $perPage = 25;

    public function render()
    {
        $files = File::paginate($this->perPage);
        return view('livewire.dashboard.select-image', compact('files'));
    }

    public function showFileModal($id)
    {
        $file = File::find($id);
        $this->fileName = $file->file_name;
        $this->filePath = Storage::url($file->file_path);
        $this->showFile = true;
    }

    public function loadMore()
    {
        $this->perPage += 25;
    }
}
