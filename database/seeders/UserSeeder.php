<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'super-admin',
            'email' => 'super-admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $user = User::create([
            'name' => 'fulan',
            'email' => 'fulan@gmail.com',
            'password' => bcrypt('12345678'),
        ]);


        $superAdmin->assignRole('super-admin');
        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}