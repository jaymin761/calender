<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionAllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permission for crud
        $permission=[
                       ['name'=>'insert'],
                       ['name'=>'delete'],
                       ['name'=>'edit'],
                       ['name'=>'update'],
                       ['name'=>'deleteallrecord'],
        ];
    }
}
