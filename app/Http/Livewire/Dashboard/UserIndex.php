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
    public $roles;
    public $perPage = '15';

    public $confirmingUserDeletion = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->roles == 'all') {
            $this->roles = null;
        }

        $users = User::where('name', 'like', '%'.$this->search.'%')
                    ->whereHas('roles', function ($query) {
                        return $query->where('name', 'LIKE', $this->roles);
                    })
                    ->orWhere('email', 'like', '%'.$this->search.'%')
                    ->whereHas('roles', function ($query) {
                        return $query->where('name', 'LIKE', $this->roles);
                    })
                    ->paginate($this->perPage);

        return view('livewire.dashboard.user-index', compact('users'));
    }

    public function confirmUserDeletion($id)
    {
        $this->confirmingUserDeletion = $id;
    }

    public function deleteUser(User $user)
    {
        if($user->profile_photo_path != null){
            $user->deleteProfilePhoto();
        };
        $user->delete();
        $this->confirmingUserDeletion = false;
    }
}
