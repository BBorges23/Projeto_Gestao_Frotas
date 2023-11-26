<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

/**
 * Seeder para criar e atribuir funções (roles) aos usuários no sistema.
 */
class RolesSeeder extends Seeder
{
    /**
     * Executa o processo de seed no banco de dados.
     */
    public function run(): void
    {
        // Limpa as permissões em cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Cria as roles 'admin', 'gestor' e 'driver'
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'gestor']);
        Role::create(['name' => 'driver']);

        // Atribui roles aos usuários existentes
        foreach (User::all() as $user) {
            if ($user->id == 1)
                $user->assignRole('admin');// Atribui a role 'admin' ao usuário com ID 1
            else if ($user->id == 2)
                $user->assignRole('gestor');// Atribui a role 'gestor' ao usuário com ID 2
            else {
                $user->assignRole('driver');// Atribui a role 'driver' aos demais usuários
            }
        }
    }
}
