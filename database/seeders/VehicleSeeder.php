<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Vehicle::factory(100)->create();

        DB::table('vehicles')->insert([
            'carmodel_id' => '1',
            'licence_plate' => 'AA-AA-AA',
            'year' => '2020-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO'
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '2',
            'licence_plate' => 'BB-BB-BB',
            'year' => '2023-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO'
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '3',
            'licence_plate' => 'CC-CC-CC',
            'year' => '2021-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO'
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '4',
            'licence_plate' => 'DD-DD-DD',
            'year' => '2019-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO'
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '5',
            'licence_plate' => 'EE-EE-EE',
            'year' => '2000-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO'
        ]);
    }
}
