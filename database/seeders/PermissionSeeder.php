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

        Permission::create(['name' => 'create todos']);
        Permission::create(['name' => 'fetch todos']);
        Permission::create(['name' => 'update todos']);
        Permission::create(['name' => 'delete todos']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'fetch users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);
    }
}
