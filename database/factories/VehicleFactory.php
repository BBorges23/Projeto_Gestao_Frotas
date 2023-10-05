<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            /*'model_id'=>fake()->numberBetween(1,50),
            'licence_plate' => fake()->regexify('[A-Z0-9]{8}'),
            'year'=>fake()->year,
            'date_buy'=>fake()->dateTime(now()),
            */
        ];
    }
}
