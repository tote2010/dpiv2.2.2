<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Digital', 'activo' => true],
            ['nombre' => 'Gigantografía', 'activo' => true],
            ['nombre' => 'Offset', 'activo' => true],
        ];

        foreach ($categorias as $data) {
            Categoria::updateOrCreate(
                ['nombre' => $data['nombre']],
                $data
            );
        }
    }
}
