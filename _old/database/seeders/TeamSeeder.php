<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Database\Seeders;

class TeamSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asegúrate de que la tabla esté vacía antes de sembrar
        //DB::table('teams')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Aquí tu código para truncar la tabla
        //DB::table('nombre_de_la_tabla')->truncate();
        DB::table('teams')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Crear algunos equipos de ejemplo
        $teams = [
            [
                'name' => 'Equipo Alfa',
                'user_id' => '1',
                'personal_team' => '1',
                //'description' => 'Equipo especializado en vuelos de larga distancia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Equipo Beta',
                //'user_id' => factory(User::class),
                'user_id' => '2',
                'personal_team' => '1',
                //'description' => 'Equipo de respuesta rápida para emergencias',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Equipo Gamma',
                //'user_id' => factory(User::class),
                'user_id' => '3',
                'personal_team' => '1',
                //'description' => 'Equipo de entrenamiento y formación de nuevos usuarios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insertar los equipos en la base de datos
        Team::insert($teams);
        
        //TODO Ver esto...
        // Opcionalmente, asignar usuarios aleatorios a cada equipo
        // $users = User::where('role', 'usuario')->inRandomOrder()->limit(15)->get();
        
        // Team::all()->each(function ($team) use ($users) {
        //     $team->members()->attach(
        //         $users->random(rand(3, 5))->pluck('id')->toArray()
        //     );
        // });
    }
}