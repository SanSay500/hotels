<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels_list = json_decode(Storage::get('hotels_hotels.json'), associative: true);
        foreach ($hotels_list as $hotel) {
            DB::table('hotels')->insert(values: [
                'name' => $hotel['name'],
                'street' => $hotel['street'],
                'city_id' => $hotel['city_id'],
            ]);
        }
    }
}
