<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name,
            'nif'=>fake()->numerify('#########'),
            'email'=>fake()->email,
            'phone'=>fake()->phoneNumber,
            'is_active'=>fake()->boolean(50),
            'is_working'=>fake()->boolean(50),
            'condition'=>fake()->randomElement(['EX_COLABORADOR', 'FERIAS', 'BAIXA', 'ATIVO'])

        ];
    }
}
