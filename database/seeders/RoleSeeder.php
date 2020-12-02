<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'guard_name' => 'api',
            'name' => 'administrator',
        ])->givePermissionTo([
            'permissions.view',
            'roles.create',
            'roles.view',
            'roles.update',
            'roles.delete',
            'todos.create',
            'todos.view',
            'todos.update',
            'todos.delete',
            'users.create',
            'users.view',
            'users.update',
            'users.delete',
        ]);

        Role::create([
            'guard_name' => 'api',
            'name' => 'user',
        ])->givePermissionTo([
            'todos.create',
            'todos.view',
            'todos.update',
            'todos.delete',
        ]);
    }
}
