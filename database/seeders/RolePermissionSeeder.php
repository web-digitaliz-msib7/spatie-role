<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat izin
        Permission::create(['name' => 'view-product']);
        Permission::create(['name' => 'view-order']);
        Permission::create(['name' => 'view-user']);
        Permission::create(['name' => 'view-admin-account']);
        Permission::create(['name' => 'create-admin-account']);
        Permission::create(['name' => 'update-admin-account']);
        Permission::create(['name' => 'delete-admin-account']);

        // Membuat peran
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        // Memberikan izin ke peran
        $roleSuperAdmin->givePermissionTo(Permission::all());
        // $roleAdmin->givePermissionTo(['view-product', 'view-order', 'view-user']);

        // $roleUser->givePermissionTo('view-product');
    }
}
