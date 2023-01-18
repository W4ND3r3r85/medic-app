<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'username' => 'Test user',
            'name' => 'Test Elek',
            'email' => 'telek@email.com',
            'phone' => '0742666777',
            'password' => bcrypt('teszt1234'),
        ]);
        User::create([
            'username' => 'arpi',
            'name' => 'Szekely Arpad',
            'email' => 'arpi@webgurus.io',
            'phone' => '0742666722',
            'password' => bcrypt('pass1234'),
        ]);

    }
}
