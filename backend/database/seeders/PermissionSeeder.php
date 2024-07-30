<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\Permissions;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
