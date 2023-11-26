<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder para popular a tabela 'brands' com algumas marcas de carro predefinidas.
 */
class BrandSeeder extends Seeder
{
    /**
     * Executa o processo de seed no banco de dados.
     */
    public function run(): void
    {
        // Lista de marcas de carros predefinidas
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

        // Loop para criar as entradas para inserção na tabela 'brands'
        foreach ($brands as $brand) {
            $entries[] = [
                'name' => $brand,// Nome da marca
                'created_at' => now(),// Timestamp de criação
                'updated_at' => now(),// Timestamp de atualização
            ];
        }

        // Insere as entradas na tabela 'brands'
        DB::table('brands')->insert($entries);
    }
}
