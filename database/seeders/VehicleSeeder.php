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

/*
        DB::table('vehicles')->insert([
            'carmodel_id' => '1',
            'licence_plate' => 'AA-AA-AA',
            'year' => '2020',
            'date_buy' => '2020-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '2',
            'licence_plate' => 'BB-BB-BB',
            'year' => '2023',
            'date_buy' => '2023-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '3',
            'licence_plate' => 'CC-CC-CC',
            'year' => '2021',
            'date_buy' => '2021-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '4',
            'licence_plate' => 'DD-DD-DD',
            'year' => '2019',
            'date_buy' => '2019-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '5',
            'licence_plate' => 'EE-EE-EE',
            'year' => '2000',
            'date_buy' => '2000-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '5',
            'licence_plate' => 'EF-EE-EE',
            'year' => '2000',
            'date_buy' => '2000-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '5',
            'licence_plate' => 'EG-EE-EE',
            'year' => '2000',
            'date_buy' => '2000-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '5',
            'licence_plate' => 'EH-EE-EE',
            'year' => '2000',
            'date_buy' => '2000-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '5',
            'licence_plate' => 'EI-EE-EE',
            'year' => '2000',
            'date_buy' => '2000-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '5',
            'licence_plate' => 'EJ-EE-EE',
            'year' => '2000',
            'date_buy' => '2000-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '5',
            'licence_plate' => 'EL-EE-EE',
            'year' => '2000',
            'date_buy' => '2000-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '5',
            'licence_plate' => 'EM-EE-EE',
            'year' => '2000',
            'date_buy' => '2000-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('vehicles')->insert([
            'carmodel_id' => '5',
            'licence_plate' => 'EN-EE-EE',
            'year' => '2000',
            'date_buy' => '2000-12-19',
            'is_driving'=> '1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        */
    }
}
