<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

//        $isActive = $this->faker->boolean(50);

        return [
//            'vehicle_id'=>fake()->numberBetween(1,10),
//            'motive'=>fake()->text,
//            'date_entry'=>fake()->dateTime(now()),
//            'date_exit'=>fake()->dateTimeBetween('now','+2 week'),
//            'deleted_at'=> $isActive ? null : $this->faker->dateTimeThisDecade('-1 year'),
//            'is_active'=>$isActive,
//            'state' => $isActive ? $this->faker->randomElement(['PROCESSANDO']) : $this->faker->randomElement(['CONCLUIDO', 'CANCELADO']),
        ];
    }
}
