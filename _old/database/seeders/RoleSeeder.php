<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $role1 = Role::create(['name' => 'Superadmin']);
        $role2 = Role::create(['name' => 'Administrador']);
        $role3 = Role::create(['name' => 'Gestor']);
        $role4 = Role::create(['name' => 'Cliente']);
        // $role5 = Role::create(['name' => 'Instructor / Piloto Seguridad']);
        // $role6 = Role::create(['name' => 'Piloto']);
        // $role7 = Role::create(['name' => 'Piloto Alumno']);

        // //Permisos
        // Permission::create(['name' => 'admin.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6, $role7]);

        // Permission::create(['name' => 'admin.pilotos.index'])->syncRoles([$role1, $role2, $role3, $role5]);
        // Permission::create(['name' => 'admin.pilotos.create'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.pilotos.show'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.pilotos.edit'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.pilotos.destroy'])->syncRoles([$role1]);;
        
        // Permission::create(['name' => 'admin.aeropuertos.index'])->syncRoles([$role1, $role2, $role3, $role5]);
        // Permission::create(['name' => 'admin.aeropuertos.create'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.aeropuertos.show'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.aeropuertos.edit'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.aeropuertos.destroy'])->syncRoles([$role1]);;
        
        // Permission::create(['name' => 'admin.configuraciones.index'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.configuraciones.create'])->syncRoles([$role1]);
        // Permission::create(['name' => 'admin.configuraciones.show'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.configuraciones.edit'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.configuraciones.destroy'])->syncRoles([$role1]);
        
        // Permission::create(['name' => 'admin.estadoTurnos.index'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.estadoTurnos.create'])->syncRoles([$role1]);
        // Permission::create(['name' => 'admin.estadoTurnos.show'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.estadoTurnos.edit'])->syncRoles([$role1]);
        // Permission::create(['name' => 'admin.estadoTurnos.destroy'])->syncRoles([$role1]);

        // Permission::create(['name' => 'admin.aeronaves.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        // Permission::create(['name' => 'admin.aeronaves.create'])->syncRoles([$role1, $role2, $role4]);
        // Permission::create(['name' => 'admin.aeronaves.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        // Permission::create(['name' => 'admin.aeronaves.edit'])->syncRoles([$role1, $role2, $role4]);
        // Permission::create(['name' => 'admin.aeronaves.destroy'])->syncRoles([$role1]);

        // Permission::create(['name' => 'admin.aviones.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        // Permission::create(['name' => 'admin.aviones.create'])->syncRoles([$role1, $role2, $role4]);
        // Permission::create(['name' => 'admin.aviones.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        // Permission::create(['name' => 'admin.aviones.edit'])->syncRoles([$role1, $role2, $role4]);
        // Permission::create(['name' => 'admin.aviones.destroy'])->syncRoles([$role1]);

        // Permission::create(['name' => 'admin.motores.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        // Permission::create(['name' => 'admin.motores.create'])->syncRoles([$role1, $role2, $role4]);
        // Permission::create(['name' => 'admin.motores.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        // Permission::create(['name' => 'admin.motores.edit'])->syncRoles([$role1, $role2, $role4]);
        // Permission::create(['name' => 'admin.motores.destroy'])->syncRoles([$role1]);

        // Permission::create(['name' => 'admin.helices.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        // Permission::create(['name' => 'admin.helices.create'])->syncRoles([$role1, $role2, $role4]);
        // Permission::create(['name' => 'admin.helices.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        // Permission::create(['name' => 'admin.helices.edit'])->syncRoles([$role1, $role2, $role4]);
        // Permission::create(['name' => 'admin.helices.destroy'])->syncRoles([$role1]);

        // Permission::create(['name' => 'admin.licencias.index'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.licencias.create'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.licencias.show'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.licencias.edit'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.licencias.destroy'])->syncRoles([$role1]);

        // Permission::create(['name' => 'admin.tipoVuelos.index'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.tipoVuelos.create'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.tipoVuelos.show'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.tipoVuelos.edit'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'admin.tipoVuelos.destroy'])->syncRoles([$role1]);

        // // Ver Roles sec
        // Permission::create(['name' => 'admin.turnos.index'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.turnos.create'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.turnos.show'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.turnos.edit'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.turnos.destroy'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.turnos.getTurnos'])->syncRoles([$role1, $role2, $role3]);

        // //Permission::create(['name' => 'admin.turnos']);

        // Permission::create(['name' => 'admin.vuelos.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6, $role7]);
        // Permission::create(['name' => 'admin.vuelos.create'])->syncRoles([$role1, $role2, $role3, $role5]);
        // Permission::create(['name' => 'admin.vuelos.show'])->syncRoles([$role1, $role2, $role3, $role5]);
        // Permission::create(['name' => 'admin.vuelos.edit'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.vuelos.destroy'])->syncRoles([$role1]);
        // Permission::create(['name' => 'admin.vuelos.getTurnos'])->syncRoles([$role1, $role2, $role3]);
        // Permission::create(['name' => 'admin.vuelos.autocomplete'])->syncRoles([$role1, $role2, $role3]);
    }
}
