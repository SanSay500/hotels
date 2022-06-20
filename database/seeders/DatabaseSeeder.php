<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(7)->create();
         \App\Models\Offer::factory(30)->create();
         Order::factory(30)->create();
        $this->call([
            CitySeeder::class,
            HotelSeeder::class,
            OrderStatusSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'Alex',
            'email' => 'borodachev@gmail.com',
        ]);
         DB::table('rooms')->insert(values: [
             'room_class'=>'Standart'
        ]);
        DB::table('rooms')->insert(values: [
            'room_class'=>'Superior'
        ]);
        DB::table('meals')->insert(values: [
            'meals'=>'RO'
        ]);
        DB::table('meals')->insert(values: [
            'meals'=>'BB',
        ]);
        DB::table('meals')->insert(values: [
            'meals'=>'HB'
        ]);
        DB::table('meals')->insert(values: [
            'meals'=>'FB'
        ]);
        DB::table('meals')->insert(values: [
            'meals'=>'AI'
        ]);
    }
}
