<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Cancelled', 'Completed', 'Pending'];
        foreach ($statuses as $status) {
            DB::table('order_statuses')->insert(values: [
                'status_name' => $status,
            ]);
        }
    }
}
