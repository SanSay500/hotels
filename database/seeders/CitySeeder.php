<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = Storage::get('israel_cities.csv');
        $cities_list=explode(PHP_EOL,$contents);
       foreach ($cities_list as $city) {
           DB::table('cities')->insert(values: [
               'name' => $city
           ]);
       }
    }
}
