<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=
        [
            [
                'name'=>'role-read',
                'display_name'=>'Display role listing',
                'description'=>'see only listing of role'
            ],
            [
                'name'=>'role-create',
                'display_name'=>'create role',
                'description'=>'create new role'
            ],
            [
                'name'=>'role-delete',
                'display_name'=>'delete role',
                'description'=>'delete role'
            ],
            [
                'name'=>'role-edit',
                'display_name'=>'edit role',
                'description'=>'edit role'
            ],
            // 

            [
                'name'=>'product-read',
                'display_name'=>'Display product listing',
                'description'=>'see only listing of product'
            ],
            [
                'name'=>'product-create',
                'display_name'=>'create product',
                'description'=>'create new product'
            ],
            [
                'name'=>'product-delete',
                'display_name'=>'delete product',
                'description'=>'delete product'
            ],
            [
                'name'=>'product-edit',
                'display_name'=>'edit product',
                'description'=>'edit roproductle'
            ],
             // 

             [
                'name'=>'user-read',
                'display_name'=>'Display user listing',
                'description'=>'see only listing of user'
            ],
            [
                'name'=>'user-create',
                'display_name'=>'create product',
                'description'=>'create new user'
            ],
            [
                'name'=>'user-delete',
                'display_name'=>'delete product',
                'description'=>'delete user'
            ],
            [
                'name'=>'user-edit',
                'display_name'=>'edit product',
                'description'=>'edit user'
            ],




        ];

        // 
        foreach ($permissions as $key => $value) {
            Permission::create($value);
            # code...
        }
       
    }
}
