<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Prompts\Table;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::factory(5)->create();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@teste.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'gestor',
            'email' => 'gestor@teste.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'driver',
            'email' => 'driver@teste.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

    }
}
