<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo(Permission::all());

        $user=User::create([
            'name'=>'jayminnarigara',
            'email'=>'jayminnarigara123@gmail.com',
            'password'=>Hash::make('jaymin123'),
        ]);
        $user->assignRole('admin');
    }
}
