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

        $isActive = $this->faker->boolean(50);
        $isWorking = $this->faker->boolean(50);

        return [
            'name'=>fake()->name,
            'nif'=>fake()->numerify('#########'),
            'email'=>fake()->email,
            'phone'=>fake()->phoneNumber,
            'deleted_at'=> $isActive ? null : $this->faker->dateTimeThisDecade('-1 year'),
            'is_working'=> $isWorking,
            'condition'=> $isActive ? ($isWorking ? 'ATIVO' : $this->faker->randomElement(['BAIXA','FERIAS']
            )): 'EX_COLABORADOR'
        ];
    }
}
