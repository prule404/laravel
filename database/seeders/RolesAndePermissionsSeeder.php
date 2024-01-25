<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndePermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $default = ['guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()];

        $permissions = [
            'create_post',
            'edit_post',
            'delete_post',
        ];

        $rolesAndPermissions = [
            'admin' => [
                'create_post',
                'edit_post',
                'delete_post',
            ],
            'user' => [
                'create_post',
                'edit_post',
            ],
        ];
        $roles = array_map(
            fn ($role) => ['name' => $role, ...$default],
            array_keys($rolesAndPermissions)
        );

        Role::insert($roles);

        $SinglePermission = array_map(
            fn ($permission) => ['name' => $permission, ...$default],
            $permissions
        );
        Permission::insert($SinglePermission);

        foreach (array_keys($rolesAndPermissions) as $roleName) {
            Role::where('name', $roleName)
                ->first()
                ->givePermissionTo($rolesAndPermissions[$roleName]);
        }
    }
}
