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
            'password' => bcrypt('awdawdawd'),
        ]);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('awdawdawd'),
        ]);
        $user = User::create([
            'name' => 'fulan',
            'email' => 'fulan@gmail.com',
            'password' => bcrypt('awdawdawd'),
        ]);


        $superAdmin->assignRole('super-admin');
        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}