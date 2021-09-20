<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;


class PostIndex extends Component
{
    use WithPagination;

    public $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '15'],
    ];

    public $search;
    public $perPage = '15';

    public $confirmingPostDeletion = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::all();
        $posts = Post::where('title', 'like', '%'.$this->search.'%')
                    ->orderBy('created_at', 'desc')
                    ->orWhere('abstract', 'like', '%'.$this->search.'%')->orderBy('created_at', 'desc')
                    ->orWhere('content', 'like', '%'.$this->search.'%')->orderBy('created_at', 'desc')
                    ->paginate($this->perPage);
        return view('livewire.dashboard.post-index', compact('posts', 'categories'));
    }

    public function confirmPostDeletion($id)
    {
        $this->confirmingPostDeletion = $id;
    }

    public function deletePost(Post $post)
    {
        if ($post->image) {
            Storage::deleteDirectory($post->image);
        }
        $post->delete();
        $this->confirmingPostDeletion = false;
    }
}
