<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '15']
    ];

    public $search;
    public $perPage = '15';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('email', 'like', '%'.$this->search.'%')
                    ->paginate($this->perPage);

        return view('livewire.dashboard.user-index', compact('users'));
    }
}
