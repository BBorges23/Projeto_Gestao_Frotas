<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Ford',
            'Toyota',
            'Honda',
            'Chevrolet',
            'Volkswagen',
            'Nissan',
            'BMW',
            'Mercedes-Benz',
            'Audi',
            'Hyundai',
            'Kia',
            'Subaru',
            'Mazda',
            'Jeep',
            'Lexus',
            'Volvo',
            'Jaguar',
            'Porsche',
            'Ferrari',
            'Lamborghini',
            'Tesla',
            'Mitsubishi',
            'Land Rover',
            'Chrysler',
            'Dodge',
            'Buick',
            'Cadillac',
            'GMC',
            'Acura',
        ];

        $entries = [];

        foreach ($brands as $brand) {
            $entries[] = [
                'name' => $brand,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('brands')->insert($entries);
    }
}
