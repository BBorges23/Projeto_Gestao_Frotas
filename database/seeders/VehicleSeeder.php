<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder para popular a tabela de veículos (vehicles) no banco de dados.
 */
class VehicleSeeder extends Seeder
{
    /**
     * Executa o processo de seed no banco de dados.
     */
    public function run(): void
    {
        //Uso da Factory para a criação de veículos.
        Vehicle::factory(50)->create();


    }
}
