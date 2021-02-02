<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RankingSTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ranking_slide')->insert([
          'id' => '1',
          'score' => '1000',
          'date' => '02/02/2021',
          'mode' => '1',
      ]);

      DB::table('ranking_slide')->insert([
          'id' => '2',
          'score' => '800',
          'date' => '01/02/2021',
          'mode' => '2',
      ]);

    }
}
