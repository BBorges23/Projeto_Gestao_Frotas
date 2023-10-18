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
            'motive' => 'Óleo',
            'date_entry' => '14-10-2023',
            'date_exit'=> '16-10-2023',
            'is_active' => '1',
            'state' => 'PROCESSANDO'
        ]);
        DB::table('maintenances')->insert([
            'vehicle_id' => '2',
            'motive' => 'Pneu',
            'date_entry' => '10-10-2023',
            'date_exit'=> '16-10-2023',
            'is_active' => '1',
            'state' => 'PROCESSANDO'
        ]);
        DB::table('maintenances')->insert([
            'vehicle_id' => '3',
            'motive' => 'Motor',
            'date_entry' => '10-10-2023',
            'date_exit'=> '16-10-2023',
            'is_active' => '1',
            'state' => 'PROCESSANDO'
        ]);
        DB::table('maintenances')->insert([
            'vehicle_id' => '4',
            'motive' => 'Radiador',
            'date_entry' => '13-10-2023',
            'date_exit'=> '16-10-2023',
            'is_active' => '1',
            'state' => 'PROCESSANDO'
        ]);
        DB::table('maintenances')->insert([
            'vehicle_id' => '5',
            'motive' => 'Chassis',
            'date_entry' => '14-10-2023',
            'date_exit'=> '17-10-2023',
            'is_active' => '1',
            'state' => 'PROCESSANDO'
        ]);
    }
}
