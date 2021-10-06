<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public $queryString = [
        'words' => ['except' => ''],
        'perPage' => ['except' => '5'],
    ];

    public $words;
    public $search;
    public $perPage = '5';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->words . '%')
                    ->paginate($this->perPage);
        $recentPosts = Post::latest()->take(5)->get();
        $categories = Category::all();
        return view('livewire.frontend.post-index', compact('posts', 'recentPosts', 'categories'));
    }

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function search()
    {
        $this->words = $this->search;
    }
}
