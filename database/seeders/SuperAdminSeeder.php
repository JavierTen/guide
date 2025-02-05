<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el rol de super-administrador
        $superAdminRole = Role::create(['name' => 'super-administrador']);

        // Asignar el rol a un usuario específico
        $user = User::find(1); // Cambia "1" por el ID de tu usuario
        $user->assignRole($superAdminRole);
    }
}
