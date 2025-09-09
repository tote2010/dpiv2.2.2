<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear usuario superadministrador
        $superadmin = User::create([
            'name' => 'Super Admin',
            'lastname' => 'supad',
            'email' => 'root@root.com',
            'password' => Hash::make('root'),
            'email_verified_at' => now(),
        ]);
        // Asignar rol de usuario
        $superadmin->assignRole('Superadmin');

        // Crear usuario administrador
        $admin = User::create([
            'name' => 'Admin',
            'lastname' => 'ad',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
        ]);
        // Asignar rol de administrador Tester
        $admin->assignRole('Admin');

        // Crear usuario administrador
        $test = User::create([
            'name' => 'Admin Test',
            'lastname' => 'adtes',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'email_verified_at' => now(),
        ]);
        // Asignar rol de administrador
        $test->assignRole('Superadmin');

        // Crear usuario empleado
        $empleado = User::create([
            'name' => 'Empleado',
            'lastname' => 'emp',
            'email' => 'empleado@empleado.com',
            'password' => Hash::make('empleado'),
            'email_verified_at' => now(),
        ]);
        // Asignar rol de usuario
        $empleado->assignRole('Empleado');

        // Crear usuario normal
        $user = User::create([
            'name' => 'User',
            'lastname' => 'cli',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
            'email_verified_at' => now(),
        ]);
        // Asignar rol de usuario
        $user->assignRole('Cliente');

    }
}
