<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
          'type' => 'Numerico',
          'name' => 'Sliding Tiles Puzzle',
          'description' => 'Atrevete a resolver este puzzle numerico ',
          'img_fondo' => 'x',
          'img_puzzle' => 'x',
      ]);

      DB::table('tematicas_slide')->insert([
          'id' => '2',
          'type' => 'puzzle',
          'name' => 'Sliding Tiles Puzzle',
          'description' => 'Atrevete a resolver este puzzle con imagen en el orden correcto',
          'img_fondo' => 'x',
          'img_puzzle' => 'x',
      ]);
    }
}
