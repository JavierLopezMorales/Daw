<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TematicasSTTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tematicas_slide')->insert([
          'id' => '1',
          'type' => 'Puzzle',
          'name' => 'Almeria',
          'description' => 'Prueba este puzzle de un instituto historico de la ciudad de Almeria.  ',
          'img_fondo' => 'celia.jpg',
          'img_puzzle' => 'celia2.jpg',
          'modo' => '3'
      ]);

      DB::table('tematicas_slide')->insert([
          'id' => '2',
          'type' => 'Puzzle',
          'name' => 'Alcazaba',
          'description' => 'Atrevete a resolver el puzzle de la alcazaba (pista:guiate por los números o lo pasarás mal)',
          'img_fondo' => 'alcazaba.jpg',
          'img_puzzle' => 'alcazaba2.jpg',
          'modo' => '3'
      ]);
      DB::table('tematicas_slide')->insert([
          'id' => '3',
          'type' => 'Puzzle',
          'name' => 'Cabo de Gata',
          'description' => 'Hermoso paisaje para ver mientras juegas',
          'img_fondo' => 'cabo.jpg',
          'img_puzzle' => 'cabo2.jpg',
          'modo' => '3'
      ]);
      DB::table('tematicas_slide')->insert([
          'id' => '4',
          'type' => 'Puzzle',
          'name' => 'España',
          'description' => 'Bandera de españa , para realizar un puzzle patriotico',
          'img_fondo' => 'bandera.jpg',
          'img_puzzle' => 'bandera2.jpg',
          'modo' => '3'
      ]);
      DB::table('tematicas_slide')->insert([
          'id' => '5',
          'type' => 'Puzzle',
          'name' => 'Numeros',
          'description' => 'Ahora toca un puzzle con numeros',
          'img_fondo' => 'numeros.jpg',
          'img_puzzle' => 'numeros2.jpg',
          'modo' => '3'
      ]);
    }
}
