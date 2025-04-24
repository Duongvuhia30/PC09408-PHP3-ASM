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
                'password' => bcrypt('password123'),
            ]
        )->fresh(); // ✅ đảm bảo có đầy đủ ID

        if ($admin && $admin->row_id) {
            $admin->assignRole('super_admin');
        }

        // Tạo client
        $client = User::firstOrCreate(
            ['email' => 'client@example.com'],
            [
                'name' => 'Client',
                'password' => bcrypt('password123'),
            ]
        )->fresh();

        if ($client && $client->row_id) {
            $client->assignRole('client');
        }
    }
}
