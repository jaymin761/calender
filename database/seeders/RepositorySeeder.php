<?php

namespace Database\Seeders;

use App\Models\Repositery;
use Illuminate\Database\Seeder;

class RepositorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Repositery::create([
                'name'=>'jaymin',
                'email'=>'jaymin@gmail.com',
                'phone'=>'8758191141',
                'city'=>'surat'
        ]);
            Repositery::create([
                'name'=>'sagar',
                'email'=>'sagar@gmail.com',
                'phone'=>'7758191141',
                'city'=>'mumbai'
            ]);
            Repositery::create([
                'name'=>'mohit',
                'email'=>'mohit@gmail.com',
                'phone'=>'6758191141',
                'city'=>'dubai'
            ]);
    }
}
