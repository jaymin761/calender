<?php

namespace Database\Seeders;

use App\Models\city;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        city::create([
            'cityname'=>'surat',
            'state_id'=>'1',
        ]);
        city::create([
            'cityname'=>'gaziyabad',
            'state_id'=>'2',
        ]);
        city::create([
            'cityname'=>'barnet',
            'state_id'=>'3',
        ]);

    }
}
