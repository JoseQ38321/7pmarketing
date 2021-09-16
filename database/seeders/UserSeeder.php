<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory([
            'name' => 'José Alarcón',
            'email' => 'joseq.ja@gmail.com'
        ])->create()->assignRole('admin');

        User::factory(50)->create()->each(function ($user) {
            $user->assignRole(Role::all()->random()->name);
        });
    }
}
