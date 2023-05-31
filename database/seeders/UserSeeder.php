<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'alamat' => 'jln',
            'no_hp' => '',
            'role' => 1
        ];

        User::create($user);


        User::factory()->count(15)->create();
    }
}
