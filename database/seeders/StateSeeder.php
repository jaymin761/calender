<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'statename'=>'gujarat',
            'country_id'=>'1'
        ]);
        State::create([
            'statename'=>'lahor',
            'country_id'=>'2',

        ]);
        State::create([
            'statename'=>'califonia',
            'country_id'=>'3',
        ]);
    }
}
