<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isTraveling = $this->faker->boolean(50);

        return [
            'vehicle_id'=>fake()->numberBetween(1,10),
            'driver_id'=>fake()->numberBetween(1,10),
            'coords_origem'=>fake()->city,
            'coords_destino'=>fake()->city,
            'deleted_at'=> $isTraveling ? null : $this->faker->dateTimeThisDecade('-1 year'),
            'is_traveling'=>$isTraveling,
            'state'=> $isTraveling ? $this->faker->randomElement(['PROCESSANDO']) : $this->faker->randomElement(['CANCELADO', 'CONCLUIDO'])
        ];
    }
}
