<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@test.com',
        //     'password' => Hash::make('test'),
        //     'email_verified_at' => now(),
        // ]);
        
        //SQL tablas y datos base
        
        $path1 = database_path('sql/precios_cantidad.sql');
        echo "Looking for SQL file at: $path1\n";
        if (File::exists($path1)) {
            DB::unprepared(File::get($path1));
        } else {
            throw new \Exception("SQL file not found: $path1");
        }

        $path2 = database_path('sql/precios.sql');
        echo "Looking for SQL file at: $path2\n";
        if (File::exists($path2)) {
            DB::unprepared(File::get($path2));
        } else {
            throw new \Exception("SQL file not found: $path2");
        }

        $path3 = database_path('sql/categorias.sql');
        echo "Looking for SQL file at: $path3\n";
        if (File::exists($path3)) {
            DB::unprepared(File::get($path3));
        } else {
            throw new \Exception("SQL file not found: $path3");
        }

        $path4 = database_path('sql/productos.sql');
        echo "Looking for SQL file at: $path4\n";
        if (File::exists($path4)) {
            DB::unprepared(File::get($path4));
        } else {
            throw new \Exception("SQL file not found: $path4");
        }

        $path6 = database_path('sql/estado_pedidos.sql');
        echo "Looking for SQL file at: $path6\n";
        if (File::exists($path6)) {
            DB::unprepared(File::get($path6));
        } else {
            throw new \Exception("SQL file not found: $path6");
        }





        // $path5 = database_path('sql/pedidos.sql');
        // echo "Looking for SQL file at: $path5\n";
        // if (File::exists($path5)) {
        //     DB::unprepared(File::get($path5));
        // } else {
        //     throw new \Exception("SQL file not found: $path5");
        // }


        // $path7 = database_path('sql/favoritos.sql');
        // echo "Looking for SQL file at: $path7\n";
        // if (File::exists($path7)) {
        //     DB::unprepared(File::get($path7));
        // } else {
        //     throw new \Exception("SQL file not found: $path7");
        // }

        // $path8 = database_path('sql/pedidos_favoritos.sql');
        // echo "Looking for SQL file at: $path8\n";
        // if (File::exists($path8)) {
        //     DB::unprepared(File::get($path8));
        // } else {
        //     throw new \Exception("SQL file not found: $path8");
        // }
    }
}
