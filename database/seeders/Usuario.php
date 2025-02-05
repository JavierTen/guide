<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Usuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::create(['name' => 'usuario']);

        // Asignar el rol a un usuario específico
        $user = User::find(2); // Cambia "2" por el ID de tu usuario
        $user->assignRole($superAdminRole);
    }
}
