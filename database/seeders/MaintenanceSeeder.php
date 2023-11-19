<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
//       DB::table('maintenances')->insert([
//           ['state'=>false, 'vehicle_id'=>1,'motive'=>'Oléo','created_at'=>now(), 'updated_at'=>now()],
//
//
//       ]);

        //Maintenance::factory(10)->create();
        DB::table('maintenances')->insert([
            'vehicle_id' => '1',
            'motive' => 'Mudança de Óleo',
            'date_entry' => '2023-10-14',
            'date_exit'=> '2023-10-16',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '2',
            'motive' => 'Pneu Furado',
            'date_entry' => '2023-10-12',
            'date_exit'=> '2023-10-17',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '3',
            'motive' => 'Cabeça do Motor Queimada',
            'date_entry' => '2023-10-14',
            'date_exit'=> '2023-10-20',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '4',
            'motive' => 'Radiador',
            'date_entry' => '2023-10-08',
            'date_exit'=> '2023-10-16',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '5',
            'motive' => 'Chassis',
            'date_entry' => '2023-10-11',
            'date_exit'=> '2023-10-16',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '5',
            'motive' => 'Vidros Partidos',
            'date_entry' => '2023-10-11',
            'date_exit'=> '2023-10-16',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '5',
            'motive' => 'Pneu Furado',
            'date_entry' => '2023-10-11',
            'date_exit'=> '2023-10-16',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '5',
            'motive' => 'Mudança de Oleo',
            'date_entry' => '2023-10-11',
            'date_exit'=> '2023-10-16',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '5',
            'motive' => 'Componente Electrico',
            'date_entry' => '2023-10-11',
            'date_exit'=> '2023-10-16',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '8',
            'motive' => 'Revisão Anual',
            'date_entry' => '2023-10-11',
            'date_exit'=> '2023-10-16',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '8',
            'motive' => 'Troca de Bateria',
            'date_entry' => '2023-10-11',
            'date_exit'=> '2023-10-16',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '9',
            'motive' => 'Pneu Furado',
            'date_entry' => '2023-10-11',
            'date_exit'=> '2023-10-16',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '11',
            'motive' => 'Mudança de Oleo',
            'date_entry' => '2023-11-19',
            'date_exit'=> '2023-11-20',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '13',
            'motive' => 'Mudança de Filtros',
            'date_entry' => '2023-11-20',
            'date_exit'=> '2023-11-21',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '15',
            'motive' => 'Vidro Partido',
            'date_entry' => '2023-11-25',
            'date_exit'=> '2023-11-26',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '20',
            'motive' => 'Injetores',
            'date_entry' => '2023-06-20',
            'date_exit'=> '2023-06-21',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '21',
            'motive' => 'Avaria no Motor de Arranque',
            'date_entry' => '2023-03-20',
            'date_exit'=> '2023-03-25',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '23',
            'motive' => 'Falha no Alternador',
            'date_entry' => '2023-04-01',
            'date_exit'=> '2023-04-03',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '25',
            'motive' => 'Direcção Desalinhada',
            'date_entry' => '2023-09-11',
            'date_exit'=> '2023-09-11',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('maintenances')->insert([
            'vehicle_id' => '30',
            'motive' => 'Lâmpada Fundida',
            'date_entry' => '2023-07-13',
            'date_exit'=> '2023-07-13',
            'is_active' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
