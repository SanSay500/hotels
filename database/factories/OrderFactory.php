<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hotel'=>$this->faker->company(),
            'offer_id'=>$this->faker->numberBetween(1,30),
            'price'=>$this->faker->numberBetween(500,10000),
            'nights'=>$this->faker->numberBetween(1,30),
            'arrival_date'=>$this->faker->dateTimeThisYear,
            'city'=>$this->faker->city(),
            'seller_id'=>$this->faker->numberBetween(1,7),
            'buyer_id'=>$this->faker->numberBetween(1,7),
            'status'=>$this->faker->randomElement(['Pending','Processing','Completed']),
            'rooms_quantity'=>$this->faker->numberBetween(1,15)
        ];
    }
}
