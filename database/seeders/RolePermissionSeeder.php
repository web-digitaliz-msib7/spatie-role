<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'show-product',]);
        Permission::create(['name' => 'show-order',]);
        Permission::create(['name' => 'show-user',]);
        Permission::create(['name' => 'show-admin-account',]);
        Permission::create(['name' => 'create-admin-account',]);
        Permission::create(['name' => 'update-admin-account',]);
        Permission::create(['name' => 'delete-admin-account',]);

        Role::create(['name' => 'super-admin',]);
        Role::create(['name' => 'admin',]);
        Role::create(['name' => 'user',]);

        $roleSuperAdmin = Role::findByName('super-admin');
        $roleSuperAdmin->givePermissionTo('show-product');
        $roleSuperAdmin->givePermissionTo('show-order');
        $roleSuperAdmin->givePermissionTo('show-user');
        $roleSuperAdmin->givePermissionTo('show-admin-account');
        $roleSuperAdmin->givePermissionTo('create-admin-account');
        $roleSuperAdmin->givePermissionTo('update-admin-account');
        $roleSuperAdmin->givePermissionTo('delete-admin-account');

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('show-product');
        $roleAdmin->givePermissionTo('show-order');
        $roleAdmin->givePermissionTo('show-user');
    }
}