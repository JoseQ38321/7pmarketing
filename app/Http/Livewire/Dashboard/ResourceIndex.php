<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Resource;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ResourceIndex extends Component
{
    use WithPagination;

    public $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '15'],
    ];

    public $search;
    public $perPage = '15';

    public $confirmingResourceDeletion = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::all();
        $resources = Resource::where('title', 'like', '%'.$this->search.'%')
                    ->orderBy('created_at', 'desc')
                    ->orWhere('abstract', 'like', '%'.$this->search.'%')->orderBy('created_at', 'desc')
                    ->orWhere('content', 'like', '%'.$this->search.'%')->orderBy('created_at', 'desc')
                    ->paginate($this->perPage);
        return view('livewire.dashboard.resource-index', compact('resources', 'categories'));
    }

    public function confirmResourceDeletion($id)
    {
        $this->confirmingResourceDeletion = $id;
    }

    public function deleteResource(Resource $resource)
    {
        if ($resource->image) {
            Storage::deleteDirectory($resource->image);
        }
        $resource->delete();
        $this->confirmingResourceDeletion = false;
    }
}
