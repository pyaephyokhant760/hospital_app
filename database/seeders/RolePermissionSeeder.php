<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Define permissions
        $permissions = [
            'create posts',
            'edit posts',
            'delete posts',
            'view posts',
            'manage users'
        ];

        // Create permissions if they don’t exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define roles and assign permissions
        $roles = [
            'admin' => ['create posts', 'edit posts', 'delete posts', 'view posts', 'manage users'],
            'editor' => ['create posts', 'edit posts', 'view posts'],
            'user' => ['view posts'],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}

