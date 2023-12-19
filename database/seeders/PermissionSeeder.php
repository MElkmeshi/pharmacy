<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Add_Product',
            'Delete_Product',
            'Update_Product',
            'Update_Order',
            'Delete_Order',
            'Live_Chat_With_User',
            'Add_Permission',
            'Update_Permission',
            'Delete_Permission',
            'Update_User',
            'Delete_User'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
