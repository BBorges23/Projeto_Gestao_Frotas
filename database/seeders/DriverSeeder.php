<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Driver::factory(10)->create();

        DB::table('drivers')->insert([
            'user_id'=> '1',
            'nif' => '123456789',
            'phone'=>'911234567',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '2',
            'nif' => '987654321',
            'phone'=>'926789012',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '3',
            'nif' => '654321789',
            'phone'=>'939456789',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '4',
            'nif' => '987123456',
            'phone'=>'968123456',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '5',
            'nif' => '321654987',
            'phone'=>'920987654',
            'is_working' =>'1',
            'condition' => 'FERIAS',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '6',
            'nif' => '456789123',
            'phone'=>'935345678',
            'is_working' =>'1',
            'condition' => 'EX_COLABORADOR',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '7',
            'nif' => '789123654',
            'phone'=>'961234567',
            'is_working' =>'1',
            'condition' => 'EX_COLABORADOR',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '8',
            'nif' => '989123654',
            'phone'=>'961234568',
            'is_working' =>'1',
            'condition' => 'BAIXA',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
