<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $perms = [
            'service.view','service.create','service.update','service.delete',
        ];
        foreach ($perms as $p) {
            Permission::firstOrCreate(['name' => $p]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);

        $admin->givePermissionTo($perms);
        $editor->givePermissionTo(['service.view','service.create','service.update']);
    }
}
