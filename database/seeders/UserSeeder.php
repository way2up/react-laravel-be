<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->createCustomUser();
        return User::factory()->count(10)->create();
    }

    public function createCustomUser()
    {
        return User::create([
            'name' => 'User',
            'email' => 'user@mail.ru',
            'password' => bcrypt('password'),
        ]);
    }
}
