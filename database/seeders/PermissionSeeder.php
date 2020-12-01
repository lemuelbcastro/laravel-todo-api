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

        Permission::create(['guard_name' => 'api', 'name' => 'create todos']);
        Permission::create(['guard_name' => 'api', 'name' => 'fetch todos']);
        Permission::create(['guard_name' => 'api', 'name' => 'update todos']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete todos']);
        Permission::create(['guard_name' => 'api', 'name' => 'create users']);
        Permission::create(['guard_name' => 'api', 'name' => 'fetch users']);
        Permission::create(['guard_name' => 'api', 'name' => 'update users']);
        Permission::create(['guard_name' => 'api', 'name' => 'delete users']);
    }
}
