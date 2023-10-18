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
        //Driver::factory(100)->create();

        DB::table('drivers')->insert([
            'name' => 'Ruben',
            'nif' => '123456789',
            'email' => 'ruben@gmail.com',
            'phone'=>'911234567',
            'is_working' =>'1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'name' => 'Bruno',
            'nif' => '987654321',
            'email' => 'bruno@gmail.com',
            'phone'=>'926789012',
            'is_working' =>'1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'name' => 'Miguel',
            'nif' => '654321789',
            'email' => 'miguel@gmail.com',
            'phone'=>'939456789',
            'is_working' =>'1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'name' => 'Rui',
            'nif' => '987123456',
            'email' => 'rui@gmail.com',
            'phone'=>'968123456',
            'is_working' =>'1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'name' => 'Jaquim',
            'nif' => '321654987',
            'email' => 'jaquim@gmail.com',
            'phone'=>'920987654',
            'is_working' =>'1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'name' => 'Sebastiao',
            'nif' => '456789123',
            'email' => 'sebastiao@gmail.com',
            'phone'=>'935345678',
            'is_working' =>'1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('drivers')->insert([
            'name' => 'gertrudes',
            'nif' => '789123654',
            'email' => 'gertrudes@gmail.com',
            'phone'=>'961234567',
            'is_working' =>'1',
            'condition' => 'ATIVO',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}
