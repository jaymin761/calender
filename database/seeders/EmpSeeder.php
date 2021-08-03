<?php

namespace Database\Seeders;

use App\Models\Emp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Emp::create([
            'email'=>'sagarnarigara@gmail.com',
            'password'=>Hash::make('sagar123')
        ]);
    }
}
