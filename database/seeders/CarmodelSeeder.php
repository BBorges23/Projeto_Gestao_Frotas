<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder para popular a tabela 'carmodels' com alguns modelos de carros predefinidos.
 */
class CarmodelSeeder extends Seeder
{
    /**
     * Executa o processo de seed no banco de dados.
     */
    public function run(): void
    {
        // Lista de modelos de carros predefinidos
        $carmodels = [
            'Mustang', 'F-150', 'Focus', 'Explorer',
            'Camry', 'Corolla', 'RAV4', 'Prius',
            'Civic', 'Accord', 'CR-V', 'Fit',
            'Silverado', 'Malibu', 'Equinox', 'Tahoe',
            'Golf', 'Jetta', 'Passat', 'Tiguan',
            'Altima', 'Sentra', 'Rogue', 'Pathfinder',
            '3 Series', '5 Series', 'X5', '7 Series',
            'C-Class', 'E-Class', 'GLC', 'S-Class',
            'A3', 'A4', 'Q5', 'Q7',
            'Sonata', 'Elantra', 'Tucson', 'Santa Fe',
            'Optima', 'Soul', 'Sportage', 'Telluride',
            'Outback', 'Impreza', 'Forester', 'Crosstrek',
            'Mazda3', 'Mazda6', 'CX-5', 'MX-5 Miata',
            'Wrangler', 'Cherokee', 'Grand Cherokee', 'Renegade',
            'RX', 'ES', 'IS', 'NX',
            'XC90', 'S60', 'V60', 'XC40',
            'F-PACE', 'XE', 'XF', 'I-PACE',
            '911', 'Cayenne', 'Panamera', 'Macan',
            '488', '812 Superfast', 'Portofino', 'F8 Tributo',
            'Aventador', 'Huracan', 'Urus',
            'Model S', 'Model 3', 'Model X', 'Model Y',
            'Outlander', 'Eclipse Cross', 'Mirage',
            'Range Rover', 'Discovery', 'Defender', 'Evoque',
            '300', 'Pacifica', 'Voyager',
            'Charger', 'Challenger', 'Durango',
            'Encore', 'Enclave', 'Regal',
            'XT5', 'Escalade', 'CTS', 'CT6',
            'Sierra', 'Terrain', 'Acadia',
            'MDX', 'RDX', 'TLX',
        ];

        $entries = [];

        // Loop para criar as entradas para inserção na tabela 'carmodels'
        foreach ($carmodels as $carmodel) {
            $entries[] = [
                'name' => $carmodel,// Nome do modelo de carro
                'created_at' => now(),// Timestamp de criação
                'brand_id'=>fake()->numberBetween(1,29),// Gera um ID de marca aleatório
                'updated_at' => now(), // Timestamp de atualização
            ];
        }

        // Insere as entradas na tabela 'carmodels'
        DB::table('carmodels')->insert($entries);
    }
}
