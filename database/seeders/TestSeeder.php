<?php

namespace Database\Seeders;

use App\Models\ajax;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<=100;$i++)
        {
            ajax::create([
                'name'=>'mohit',
                'email'=>'mohit@gmail.com',
                'password'=>'mohit123',
                'city_id'=>'3',
                'address'=>'punagam ',
                'hobby'=>'cricket,traveling',
                'gender'=>'female',
                'image'=>'default.jfif'
            ]);
        }
    }
}
