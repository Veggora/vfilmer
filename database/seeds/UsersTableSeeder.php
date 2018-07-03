<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 27)->create();

        factory(User::class, 1)->create([
            'email' => 'user@test.com',
            'role' => 'ROLE_USER'
        ]);

        factory(User::class, 1)->create([
            'email' => 'mod@test.com',
            'role' => 'ROLE_MODERATOR'
        ]);

        factory(User::class, 1)->create([
            'email' => 'admin@test.com',
            'role' => 'ROLE_ADMINISTRATOR'
        ]);
    }
}
