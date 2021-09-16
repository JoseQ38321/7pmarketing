<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $author = Role::create(['name' => 'author']);
        $editor = Role::create(['name' => 'editor']);
        $subscriber = Role::create(['name' => 'subscriber']);

        $permission = Permission::create(['name' => 'dashboard', 'description' => 'Acceso al Escritorio'])->syncRoles([$admin, $editor, $author]);

        $permission = Permission::create(['name' => 'user.index', 'description' => 'Listar Usuarios'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'user.store', 'description' => 'Crear Usuarios'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'user.show', 'description' => 'Ver Usuarios'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'user.update', 'description' => 'Actualizar Usuarios'])->syncRoles([$admin]);
        $permission = Permission::create(['name' => 'user.destroy', 'description' => 'Eliminar Usuarios'])->syncRoles([$admin]);

        $permission = Permission::create(['name' => 'post.index', 'description' => 'Listar Posts'])->syncRoles([$admin, $author, $editor]);
        $permission = Permission::create(['name' => 'post.store', 'description' => 'Crear Posts'])->syncRoles([$admin, $author]);
        $permission = Permission::create(['name' => 'post.show', 'description' => 'Ver Posts'])->syncRoles([$admin, $author, $editor]);
        $permission = Permission::create(['name' => 'post.update', 'description' => 'Actualizar Posts'])->syncRoles([$admin, $author, $editor]);
        $permission = Permission::create(['name' => 'post.destroy', 'description' => 'Eliminar Posts'])->syncRoles([$admin, $author]);
    }
}
