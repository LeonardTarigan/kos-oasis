<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerIds = Customer::pluck('customer_id');


        $types = ['Whitesand', 'Coconut', 'Ocean', 'Wave',];
        $prices = [1000000, 1300000, 1500000, 1700000, 2000000];



        return [
            'room_no' => $this->faker->unique()->numberBetween(1, 40),
            'image' => $this->faker->imageUrl(),
            'type' => $this->faker->randomElement($types),
            'price' => $this->faker->randomElement($prices),
            'description' => $this->faker->sentence(50),
            'customer_id' => $this->faker->boolean(85) ? $this->faker->unique()->randomElement($customerIds) : null,
        ];
    }
}
