<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['guard_name' => 'api', 'name' => 'permissions.view']);
        Permission::create(['guard_name' => 'api', 'name' => 'roles.create']);
        Permission::create(['guard_name' => 'api', 'name' => 'roles.view']);
        Permission::create(['guard_name' => 'api', 'name' => 'roles.update']);
        Permission::create(['guard_name' => 'api', 'name' => 'roles.delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'roles.permissions.create']);
        Permission::create(['guard_name' => 'api', 'name' => 'roles.permissions.view']);
        Permission::create(['guard_name' => 'api', 'name' => 'roles.permissions.delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'todos.create']);
        Permission::create(['guard_name' => 'api', 'name' => 'todos.view']);
        Permission::create(['guard_name' => 'api', 'name' => 'todos.update']);
        Permission::create(['guard_name' => 'api', 'name' => 'todos.delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'users.create']);
        Permission::create(['guard_name' => 'api', 'name' => 'users.view']);
        Permission::create(['guard_name' => 'api', 'name' => 'users.update']);
        Permission::create(['guard_name' => 'api', 'name' => 'users.delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'users.roles.create']);
        Permission::create(['guard_name' => 'api', 'name' => 'users.roles.view']);
        Permission::create(['guard_name' => 'api', 'name' => 'users.roles.delete']);
    }
}
