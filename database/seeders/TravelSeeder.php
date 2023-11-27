<?php

namespace Database\Seeders;

use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Seeder para popular a tabela de viagens (travels) no banco de dados.
 */
class TravelSeeder extends Seeder
{
    /**
     * Executa o processo de seed no banco de dados.
     */
    public function run(): void
    {

        // Insere dados na tabela 'travels'
        DB::table('travels')->insert([
            'vehicle_id' => '1',
            'driver_id' => '1',
            'coords_origem' => 'Palmela',
            'coords_destino'=> 'Lisboa',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-06-01',
            'date_end'=> '2023-06-03',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('travels')->insert([
            'vehicle_id' => '2',
            'driver_id' => '2',
            'coords_origem' => 'Almada',
            'coords_destino'=> 'Lisboa',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-04-06',
            'date_end'=> '2023-04-08',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('travels')->insert([
            'vehicle_id' => '3',
            'driver_id' => '3',
            'coords_origem' => 'Seixal',
            'coords_destino'=> 'Nazaré',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-01-02',
            'date_end'=> '2023-01-03',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('travels')->insert([
            'vehicle_id' => '4',
            'driver_id' => '4',
            'coords_origem' => 'Barreiro',
            'coords_destino'=> 'Pinhal Novo',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-02-01',
            'date_end'=> '2023-02-01',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('travels')->insert([
            'vehicle_id' => '5',
            'driver_id' => '5',
            'coords_origem' => 'Évora',
            'coords_destino'=> 'Monchique',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-03-01',
            'date_end'=> '2023-03-26',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '8',
            'driver_id' => '8',
            'coords_origem' => 'Beja',
            'coords_destino'=> 'Viana do Castelo',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-08-01',
            'date_end'=> '2023-08-15',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '8',
            'driver_id' => '8',
            'coords_origem' => 'Porto',
            'coords_destino'=> 'Braga',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-10-11',
            'date_end'=> '2023-10-11',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '8',
            'driver_id' => '8',
            'coords_origem' => 'Sevilha',
            'coords_destino'=> 'Faro',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-12-15',
            'date_end'=> '2023-12-23',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '8',
            'driver_id' => '8',
            'coords_origem' => 'Lisboa',
            'coords_destino'=> 'Paris',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-04-07',
            'date_end'=> '2023-04-23',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '9',
            'driver_id' => '9',
            'coords_origem' => 'Cascais',
            'coords_destino'=> 'Berlim',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-11-19',
            'date_end'=> '2023-11-25',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '10',
            'driver_id' => '10',
            'coords_origem' => 'Barcelona',
            'coords_destino'=> 'Paris',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-11-20',
            'date_end'=> '2023-11-21',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '11',
            'driver_id' => '11',
            'coords_origem' => 'Coimbra',
            'coords_destino'=> 'Toulouse',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-11-25',
            'date_end'=> '2023-11-25',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '12',
            'driver_id' => '12',
            'coords_origem' => 'Saragoça',
            'coords_destino'=> 'Albufeira',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-11-26',
            'date_end'=> '2023-11-30',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '13',
            'driver_id' => '13',
            'coords_origem' => 'Corunha',
            'coords_destino'=> 'Caldas da Rainha',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-11-28',
            'date_end'=> '2023-11-29',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '14',
            'driver_id' => '14',
            'coords_origem' => 'Vila Real',
            'coords_destino'=> 'Montpellier',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-11-29',
            'date_end'=> '2023-11-30',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('travels')->insert([
            'vehicle_id' => '15',
            'driver_id' => '15',
            'coords_origem' => 'Pamplona',
            'coords_destino'=> 'Viseu',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-11-29',
            'date_end'=> '2023-12-05',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '16',
            'driver_id' => '16',
            'coords_origem' => 'Lisboa',
            'coords_destino'=> 'Porto',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-11-19',
            'date_end'=> '2023-11-20',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '17',
            'driver_id' => '17',
            'coords_origem' => 'Porto',
            'coords_destino'=> 'Lisboa',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-01-11',
            'date_end'=> '2023-01-16',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);


        DB::table('travels')->insert([
            'vehicle_id' => '18',
            'driver_id' => '18',
            'coords_origem' => 'Valladolid',
            'coords_destino'=> 'Marselha',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-03-07',
            'date_end'=> '2023-04-23',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '19',
            'driver_id' => '19',
            'coords_origem' => 'Valência',
            'coords_destino'=> 'Genebra',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-08-07',
            'date_end'=> '2023-08-20',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '20',
            'driver_id' => '20',
            'coords_origem' => 'Bruxelas',
            'coords_destino'=> 'Londres',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'date_start'=> '2023-02-20',
            'date_end'=> '2023-02-25',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
