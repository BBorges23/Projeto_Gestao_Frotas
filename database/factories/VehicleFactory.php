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

        $isActive = $this->faker->boolean(50);
        $isDriving = $this->faker->boolean(50);

        if (!$isActive){
            $isDriving = '0';
        }
        return [
            'carmodel_id'=>fake()->numberBetween(1,25),
            'licence_plate' => fake()->regexify('^[A-Z]{2}-\d{2}-[A-Z]{2}$'),
            'year'=>fake()->year,
            'date_buy'=>fake()->dateTime(now()),
            'is_active'=>$isActive,
            'is_driving'=>$isDriving,
            'condition'=> $isActive ? ($isDriving ? 'ATIVO': 'PARADO'): $this->faker->randomElement(['VENDIDO','PERDA_TOTAL'])
        ];
    }
}
