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
          'description' => 'Prueba este puzzle de uno de nuestros mas hermosos monumentos de nuestra ciuad ',
          'img_fondo' => 'x',
          'img_puzzle' => 'x',
          'modo' => '1'
      ]);

      DB::table('tematicas_slide')->insert([
          'id' => '2',
          'type' => 'Puzzle',
          'name' => 'Alcazaba',
          'description' => 'Atrevete a resolver el puzzle de la alcazaba (pista:guiate por los números o lo pasarás mal)',
          'img_fondo' => 'x',
          'img_puzzle' => 'x',
          'modo' => '2'
      ]);
      DB::table('tematicas_slide')->insert([
          'id' => '3',
          'type' => 'Numerico',
          'name' => 'Numeros',
          'description' => 'Este puzzle es para resolverlo con numeritos en vez de imagen',
          'img_fondo' => 'x',
          'img_puzzle' => 'x',
          'modo' => '3'
      ]);
      DB::table('tematicas_slide')->insert([
          'id' => '4',
          'type' => 'Puzzle',
          'name' => 'Cabo de Gata',
          'description' => 'Hermoso paisaje para divertirte y aprender mas de nuestra provincia y sus playas',
          'img_fondo' => 'x',
          'img_puzzle' => 'x',
          'modo' => '1'
      ]);
    }
}
