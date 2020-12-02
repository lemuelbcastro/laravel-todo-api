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
            'create todos',
            'fetch todos',
            'update todos',
            'delete todos',
            'create users',
            'fetch users',
            'update users',
            'delete users',
        ]);

        Role::create([
            'guard_name' => 'api',
            'name' => 'user',
        ])->givePermissionTo([
            'create todos',
            'fetch todos',
            'update todos',
            'delete todos',
        ]);
    }
}
