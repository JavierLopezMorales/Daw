<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
          'date' => '2021/01/23',
          'mode' => '1',
      ]);

      DB::table('ranking_slide')->insert([
          'id' => '2',
          'score' => '800',
          'date' => '2021/01/22',
          'mode' => '2',
      ]);

    }
}
