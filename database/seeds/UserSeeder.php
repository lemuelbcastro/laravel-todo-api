<?php

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
        factory(App\User::class)->create([
            'email' => 'administrator@email.com',
        ]);

        factory(App\User::class)->create([
            'email' => 'user@email.com',
        ]);
    }
}
