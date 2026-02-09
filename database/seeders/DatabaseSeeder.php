<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin fijo (para desarrollo y evidencia)
        User::updateOrCreate(
            ['email' => 'admin@jiguales.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('Admin12345*'),
                'role' => 'ADMIN',
            ]
        );

        // Usuario empleado de ejemplo (opcional, útil para pruebas de permisos)
        User::updateOrCreate(
            ['email' => 'empleado@jiguales.com'],
            [
                'name' => 'Empleado',
                'password' => Hash::make('Empleado12345*'),
                'role' => 'EMPLEADO',
            ]
        );
    }
}
