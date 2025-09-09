<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // // Crea roles con el modelo de Spatie
        // $roles = [
        //     'Superadmin',
        //     'Admin',
        //     'Empleado',
        //     'Cliente',
        // ];

        // foreach ($roles as $roleName) {
        //     Role::firstOrCreate(['name' => $roleName]);
        //     //Permisos
        //     //Permission::create(['name' => 'admin.index'])->syncRoles($roleName);
        // }

        // Muestra un mensaje en la terminal
        $this->command->info('Roles creados correctamente.');

        // Roles
        $role1 = Role::create(['name' => 'Superadmin']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Empleado']);
        $role4 = Role::create(['name' => 'Cliente']);
        
        Permission::create(['name' => 'admin.index'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$role1]);;
    }
}