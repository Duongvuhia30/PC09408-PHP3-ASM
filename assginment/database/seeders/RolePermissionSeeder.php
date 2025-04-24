<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $client     = Role::firstOrCreate(['name' => 'client', 'guard_name' => 'web']);

        $permissions = Permission::pluck('name')->toArray();
        $superAdmin->syncPermissions($permissions);

       
    }
}
