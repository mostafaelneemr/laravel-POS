<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           // roles
           'create permission',
           'show permission',
           'edit permission',
           'delete permission',
            // main side bar
           'invoices',
           'view invoice',
           'create invoice',
           'edit invoice',
           'payment invoice',
           'delete invoice',
           'print invoice',
           'archive invoice',
           // categoty
           'Elements',
           'categories',
           'create category',
           'edit category',
           'delete category',
            // product
           'Products',
           'create product',
           'edit product',
           'delete product',
            // users
           'permissions',
           'user permission',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
            // noti
            'notification',

        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
