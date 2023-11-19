<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'gestor']);
        Role::create(['name' => 'driver']);


        foreach (User::all() as $user) {
            if ($user->id == 1)
                $user->assignRole('admin');
            else if ($user->id == 2)
                $user->assignRole('gestor');
            else {
                $user->assignRole('driver');
            }
        }
    }
}
