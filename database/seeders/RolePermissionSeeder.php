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
        Permission::create(['name' => 'show-product']);
        Permission::create(['name' => 'show-order']);
        Permission::create(['name' => 'show-user']);
        Permission::create(['name' => 'show-admin-account']);
        Permission::create(['name' => 'create-admin-account']);
        Permission::create(['name' => 'update-admin-account']);
        Permission::create(['name' => 'delete-admin-account']);

        // Membuat peran
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        // Memberikan izin ke peran
        $roleSuperAdmin->givePermissionTo(Permission::all());
        $roleAdmin->givePermissionTo(['show-product', 'show-order', 'show-user']);

        $roleUser->givePermissionTo('show-product');
    }
}