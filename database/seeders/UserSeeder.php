<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->hasRoles(1, [
            'name' => 'Administrator'
        ])->create([
            'email' => 'administrator@email.com',
        ]);

        User::factory()->hasRoles(1, [
            'name' => 'User'
        ])->create([
            'email' => 'user@email.com',
        ]);
    }
}
