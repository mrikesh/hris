<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\Permissions;
use App\Enums\Roles;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            Permissions::MANAGE_EMPLOYEE,
            Permissions::MANAGE_ATTENDANCE,
            Permissions::MANAGE_DEPARTMENT,
            Permissions::MANAGE_POSITION,
            Permissions::MANAGE_LEAVE,
            Permissions::VIEW_EMPLOYEE,
            Permissions::VIEW_ATTENDANCE,
            Permissions::VIEW_DEPARTMENT,
            Permissions::VIEW_POSITION,
            Permissions::VIEW_LEAVE,
        ];

        // Define roles and their permissions
        $rolesPermissions = [
            Roles::ADMIN => $permissions,

            Roles::EMPLOYEE => [
                Permissions::VIEW_EMPLOYEE,
                Permissions::VIEW_ATTENDANCE,
                Permissions::VIEW_DEPARTMENT,
                Permissions::VIEW_POSITION,
                Permissions::VIEW_LEAVE,
            ],
        ];

        // Create roles and assign existing permissions
        foreach ($rolesPermissions as $role => $perms) {
            $roleInstance = Role::create(['name' => $role]);
            $roleInstance->givePermissionTo($perms);
        }
    }
}
