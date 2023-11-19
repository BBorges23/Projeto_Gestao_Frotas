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
        //User::factory(5)->create();

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

        DB::table('users')->insert([
            'name' => 'Sofia',
            'email' => 'sofia@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Jubileu',
            'email' => 'jubileu@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Lucas',
            'email' => 'lucas@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Isabela',
            'email' => 'isabela@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Miguel',
            'email' => 'miguel@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Larissa',
            'email' => 'larissa@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Enzo',
            'email' => 'enzo@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Beatriz',
            'email' => 'beatriz@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Matheus',
            'email' => 'matheus@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Gabriela',
            'email' => 'gabriela@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Gustavo',
            'email' => 'gustavo@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Manuela',
            'email' => 'manuela@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Pedro',
            'email' => 'pedro@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Valentina',
            'email' => 'valentina@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Leonardo',
            'email' => 'leonardo@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Camila',
            'email' => 'camila@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'David',
            'email' => 'david@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Yasmin',
            'email' => 'yasmin@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Laura',
            'email' => 'laura@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Guilherme',
            'email' => 'guilherme@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Ana',
            'email' => 'ana@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Gabriel',
            'email' => 'gabriel@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Thiago',
            'email' => 'thiago@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Clara',
            'email' => 'clara@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Rafael',
            'email' => 'rafael@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Fernanda',
            'email' => 'fernanda@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Eduardo',
            'email' => 'eduardo@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Alice',
            'email' => 'alice@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Bruno',
            'email' => 'bruno@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Carolina',
            'email' => 'carolina@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Samuel',
            'email' => 'samuel@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Julia',
            'email' => 'julia@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Victor',
            'email' => 'victor@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Mariana',
            'email' => 'mariana@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Arthur',
            'email' => 'arthur@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Leticia',
            'email' => 'leticia@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Felipe',
            'email' => 'felipe@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Amanda',
            'email' => 'amanda@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Nicolas',
            'email' => 'nicolas@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Giovanna',
            'email' => 'giovanna@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Caio',
            'email' => 'caio@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Isadora',
            'email' => 'isadora@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Alex',
            'email' => 'alex@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Helena',
            'email' => 'helena@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Diego',
            'email' => 'diego@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Luisa',
            'email' => 'luisa@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Barnabé',
            'email' => 'barnabe@email.pt',
            'email_verified_at' => now(),
            'password'=>Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

    }
}
