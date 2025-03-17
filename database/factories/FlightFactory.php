<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'departure' => $this->faker->city(),
            'arrival' => $this->faker->city(),
            'image' => $this->faker->imageUrl(),
            'airplane_id' => $this->faker->numberBetween(1, 10),
            'available' => $this->faker->boolean(),
        ];
    }
}
