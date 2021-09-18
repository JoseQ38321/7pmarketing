<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    public $confirmingRoleDeletion = false;

    public function render()
    {
        $roles = Role::all();
        return view('livewire.dashboard.role-index', compact('roles'));
    }

    public function confirmRoleDeletion($id)
    {
        $this->confirmingRoleDeletion = $id;
    }

    public function deleteRole(Role $role)
    {
        $role->delete();
        $this->confirmingRoleDeletion = false;
    }
}
