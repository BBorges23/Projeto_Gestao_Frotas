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
            'user_id'=> '3',
            'nif' => '234567890',
            'phone'=>'928765432',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '4',
            'nif' => '876543210',
            'phone'=>'969876543',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '5',
            'nif' => '345678901',
            'phone'=>'919012345',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '6',
            'nif' => '789012345',
            'phone'=>'927890123',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '7',
            'nif' => '456789012',
            'phone'=>'961234567',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '8',
            'nif' => '890123456',
            'phone'=>'929012345',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '9',
            'nif' => '567890123',
            'phone'=>'961098765',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '10',
            'nif' => '012345678',
            'phone'=>'918765432',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '11',
            'nif' => '111222333',
            'phone'=>'967890123',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '12',
            'nif' => '444555666',
            'phone'=>'927654321',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '13',
            'nif' => '777888999',
            'phone'=>'928765432',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '14',
            'nif' => '222333444',
            'phone'=>'967890123',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '15',
            'nif' => '555666777',
            'phone'=>'916543210',
            'is_working' =>'1',
            'condition' => 'FERIAS',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '16',
            'nif' => '888999000',
            'phone'=>'929876543',
            'is_working' =>'1',
            'condition' => 'FERIAS',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '17',
            'nif' => '333444555',
            'phone'=>'966789012',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '18',
            'nif' => '666777888',
            'phone'=>'921234567',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '19',
            'nif' => '999000111',
            'phone'=>'961098765',
            'is_working' =>'1',
            'condition' => 'BAIXA',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '20',
            'nif' => '444555666',
            'phone'=>'927654321',
            'is_working' =>'1',
            'condition' => 'BAIXA',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '21',
            'nif' => '123234345',
            'phone'=>'929012345',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '22',
            'nif' => '456567678',
            'phone'=>'928765432',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '23',
            'nif' => '789890901',
            'phone'=>'916543210',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '24',
            'nif' => '234345456',
            'phone'=>'961234567',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '25',
            'nif' => '567678789',
            'phone'=>'969876543',
            'is_working' =>'1',
            'condition' => 'FERIAS',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '26',
            'nif' => '890901012',
            'phone'=>'916543210',
            'is_working' =>'1',
            'condition' => 'FERIAS',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '27',
            'nif' => '345456567',
            'phone'=>'928765432',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '28',
            'nif' => '678789890',
            'phone'=>'961234567',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '29',
            'nif' => '901012123',
            'phone'=>'969876543',
            'is_working' =>'1',
            'condition' => 'BAIXA',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '30',
            'nif' => '456567678',
            'phone'=>'967890123',
            'is_working' =>'1',
            'condition' => 'BAIXA',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '31',
            'nif' => '234567890',
            'phone'=>'929012345',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '32',
            'nif' => '789012345',
            'phone'=>'966789012',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '33',
            'nif' => '987654321',
            'phone'=>'927654321',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '34',
            'nif' => '012345678',
            'phone'=>'961098765',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '35',
            'nif' => '321654987',
            'phone'=>'918765432',
            'is_working' =>'1',
            'condition' => 'FERIAS',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '36',
            'nif' => '678901234',
            'phone'=>'966789012',
            'is_working' =>'1',
            'condition' => 'FERIAS',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '37',
            'nif' => '345678901',
            'phone'=>'928765432',
            'is_working' =>'0',
            'condition' => 'EX_COLABORADOR',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '38',
            'nif' => '901234567',
            'phone'=>'967890123',
            'is_working' =>'0',
            'condition' => 'EX_COLABORADOR',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '39',
            'nif' => '567890123',
            'phone'=>'961234567',
            'is_working' =>'1',
            'condition' => 'BAIXA',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '40',
            'nif' => '123456789',
            'phone'=>'969876543',
            'is_working' =>'1',
            'condition' => 'BAIXA',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '41',
            'nif' => '987654321',
            'phone'=>'916543210',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '42',
            'nif' => '234567890',
            'phone'=>'967890123',
            'is_working' =>'1',
            'condition' => 'EM TRABALHO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '43',
            'nif' => '876543210',
            'phone'=>'918765432',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '44',
            'nif' => '345678901',
            'phone'=>'961234567',
            'is_working' =>'1',
            'condition' => 'DISPONIVEL',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '45',
            'nif' => '789012345',
            'phone'=>'929012345',
            'is_working' =>'1',
            'condition' => 'FERIAS',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '46',
            'nif' => '456789012',
            'phone'=>'928765432',
            'is_working' =>'1',
            'condition' => 'FERIAS',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '47',
            'nif' => '890123456',
            'phone'=>'966789012',
            'is_working' =>'0',
            'condition' => 'EX_COLABORADOR',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '48',
            'nif' => '567890123',
            'phone'=>'961098765',
            'is_working' =>'0',
            'condition' => 'EX_COLABORADOR',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '49',
            'nif' => '123456789',
            'phone'=>'969876543',
            'is_working' =>'1',
            'condition' => 'BAIXA',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'user_id'=> '50',
            'nif' => '987654321',
            'phone'=>'927654321',
            'is_working' =>'1',
            'condition' => 'BAIXA',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);


    }
}
