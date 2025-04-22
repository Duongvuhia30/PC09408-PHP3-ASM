<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password123'), // đừng quên mã hóa
            ]
        );

        // Gán role đã tạo trong RolePermissionSeeder
        $admin->assignRole('super_admin');

        // Tạo client
        $client = User::firstOrCreate(
            ['email' => 'client@example.com'],
            [
                'name' => 'Client',
                'password' => bcrypt('password123'),
            ]
        );

        $client->assignRole('client');
    }
}
