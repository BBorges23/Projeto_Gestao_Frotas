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

        if (!$isActive){
            $isWorking = '0';
        }
        return [
            'name'=>fake()->name,
            'nif'=>fake()->numerify('#########'),
            'email'=>fake()->email,
            'phone'=>fake()->phoneNumber,
            'is_active'=> $isActive ,
            'is_working'=> $isWorking,
            'condition'=> $isActive ? ($isWorking ? 'ATIVO' : $this->faker->randomElement(['BAIXA','FERIAS']
            )): 'EX_COLABORADOR'
        ];
    }
}
