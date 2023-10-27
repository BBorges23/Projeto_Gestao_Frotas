<?php

namespace Database\Seeders;

use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Travel::factory(10)->create();
        DB::table('travels')->insert([
            'vehicle_id' => '1',
            'driver_id' => '1',
            'coords_origem' => 'Palmela',
            'coords_destino'=> 'Lisboa',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('travels')->insert([
            'vehicle_id' => '2',
            'driver_id' => '2',
            'coords_origem' => 'Palmela',
            'coords_destino'=> 'Lisboa',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('travels')->insert([
            'vehicle_id' => '3',
            'driver_id' => '3',
            'coords_origem' => 'Palmela',
            'coords_destino'=> 'Lisboa',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('travels')->insert([
            'vehicle_id' => '4',
            'driver_id' => '4',
            'coords_origem' => 'Palmela',
            'coords_destino'=> 'Lisboa',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('travels')->insert([
            'vehicle_id' => '5',
            'driver_id' => '5',
            'coords_origem' => 'Palmela',
            'coords_destino'=> 'Lisboa',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '5',
            'driver_id' => '8',
            'coords_origem' => 'Palmela',
            'coords_destino'=> 'Lisboa',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '5',
            'driver_id' => '8',
            'coords_origem' => 'Porto',
            'coords_destino'=> 'Viana',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '5',
            'driver_id' => '8',
            'coords_origem' => 'Sevilha',
            'coords_destino'=> 'Moita',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('travels')->insert([
            'vehicle_id' => '5',
            'driver_id' => '8',
            'coords_origem' => 'Cascais',
            'coords_destino'=> 'Paris',
            'is_traveling' => '1',
            'state' => 'PROCESSANDO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
