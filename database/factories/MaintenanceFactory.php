<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
//            'state'=>fake()->boolean(50),
//            'vehicle_id'=>fake()->numberBetween(1,10),
//            'motive'=>fake()->text
//            'date_entry'=>fake()->dateTime(now()),
//            'date_exit'=>fake()->dateTimeBetween('now','+2 week')
        ];
    }
}
