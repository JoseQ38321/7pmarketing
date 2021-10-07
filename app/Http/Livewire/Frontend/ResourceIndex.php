<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\Resource;
use Livewire\Component;
use Livewire\WithPagination;

class ResourceIndex extends Component
{
    use WithPagination;

    public $queryString = [
        'words' => ['except' => ''],
        'perPage' => ['except' => '6'],
    ];

    public $words;
    public $search;
    public $perPage = '6';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $resources = Resource::where('title', 'like', '%' . $this->words . '%')
                    ->paginate($this->perPage);
        $recentResources = Resource::latest()->take(5)->get();
        $categories = Category::all();
        return view('livewire.frontend.resource-index', compact('resources', 'recentResources', 'categories'));
    }

    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function search()
    {
        $this->words = $this->search;
    }
}
