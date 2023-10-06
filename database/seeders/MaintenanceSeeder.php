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
       DB::table('maintenances')->insert([
           ['state'=>false, 'vehicle_id'=>1,'motive'=>'Oléo','created_at'=>now(), 'updated_at'=>now()],


       ]);

        //Maintenance::factory(15)->create();
    }
}
