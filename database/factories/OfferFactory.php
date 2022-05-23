<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'offer_content'=>$this->faker->text(),
        'offer_status'=>$this->faker->randomElement(['Active', 'Inactive']),
        'offer_hotel'=>$this->faker->company(),
        'offer_price'=>$this->faker->numberBetween(500,10000),
        'offer_nights'=>$this->faker->numberBetween(1,30),
        'offer_arrival_date'=>$this->faker->dateTimeInInterval('today','+3 months'),
        'offer_city'=>$this->faker->city(),
        'offer_meals'=>$this->faker->randomElement(['RO', 'BB', 'HB', 'FB', 'AI']),
        'offer_room_class'=>$this->faker->randomElement(['Superior', 'Standart']),
        'user_id'=>$this->faker->numberBetween(1,7),
        'offer_rooms_quantity'=>$this->faker->numberBetween(1,100)
        ];
    }
}
