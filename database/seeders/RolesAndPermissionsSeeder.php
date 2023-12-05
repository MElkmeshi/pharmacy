<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Define permissions
        $createPermission = Permission::create(['name' => 'create']);
        $editPermission = Permission::create(['name' => 'edit']);
        $deletePermission = Permission::create(['name' => 'delete']);

        // Assign permissions to roles
        $adminRole->givePermissionTo([$createPermission, $editPermission, $deletePermission]);
        $userRole->givePermissionTo('create');
    }
}
