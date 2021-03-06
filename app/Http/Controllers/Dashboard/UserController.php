<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Mail\UserCreated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user.index')->only('index');
        $this->middleware('can:user.store')->only('store');
        $this->middleware('can:user.show')->only('show');
        $this->middleware('can:user.edit')->only('edit');
        $this->middleware('can:user.update')->only('update');
    }

    public function index()
    {
        return view('dashboard.users.index');
    }

    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('dashboard.users.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->syncRoles([$request->roles]);
        $user->syncPermissions([$request->permissions]);

        /* Envío de mail con credenciales de acceso */
        SendEmail::dispatch($request->all());

        $request->session()->flash('flash.banner', 'Usuario agregado exitosamente');

        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('dashboard.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'roles' => 'required'
        ]);

        if ($request->password) {
            $password = $request->password;
        } else {
            $password = $user->password;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
        ]);

        $user->syncRoles([$request->roles]);

        $user->syncPermissions([$request->permissions]);

        $request->session()->flash('flash.banner', 'Usuario actualizado exitosamente');

        return redirect()->route('user.edit', $user);
    }
}
