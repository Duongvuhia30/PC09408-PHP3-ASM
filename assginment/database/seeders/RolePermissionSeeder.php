<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Xóa cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 🛠️ Tạo role
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $clientRole     = Role::firstOrCreate(['name' => 'client', 'guard_name' => 'web']);

        // 🛠️ Gán toàn bộ permission có trong DB cho super_admin
        $allPermissions = Permission::pluck('name')->toArray();
        $superAdminRole->syncPermissions($allPermissions);


        // Gán role cho user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => bcrypt('password123')]
        );
        $adminUser->assignRole('super_admin');
    }
}
