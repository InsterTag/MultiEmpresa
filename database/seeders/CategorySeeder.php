<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $categories = [
            ['name' => 'Electrónicos'],
            ['name' => 'Ropa y Moda'],
            ['name' => 'Hogar y Jardín'],
            ['name' => 'Gaming'],
            ['name' => 'Automóviles'],
            ['name' => 'Libros'],
            ['name' => 'Deportes'],
            ['name' => 'Bebés y Niños'],
            ['name' => 'Joyería'],
            ['name' => 'Cocina'],
            ['name' => 'Música'],
            ['name' => 'Fotografía'],
            ['name' => 'Herramientas'],
            ['name' => 'Salud y Belleza'],
            ['name' => 'Mascotas'],
            ['name' => 'Educación'],
            ['name' => 'Regalos'],
            ['name' => 'Viajes'],
            ['name' => 'Ecológico'],
            ['name' => 'Arte y Crafts'],
        ];

        DB::table('categories')->insert($categories);
    }
}
