<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Driver;
use App\Models\Maintenance;
use App\Models\Model;
use App\Models\Travel;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            BrandSeeder::class,
            CarModelSeeder::class,
            VehicleSeeder::class,
            DriverSeeder::class,
            MaintenanceSeeder::class,
            TravelSeeder::class,
            RolesSeeder::class
        ]);
    }
}
