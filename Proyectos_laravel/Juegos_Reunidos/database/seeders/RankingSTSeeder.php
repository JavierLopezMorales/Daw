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
          'name'=> 'MLL',
          'moves' => '458',
          'mode' => '5x5',
      ]);

      DB::table('ranking_slide')->insert([
          'id' => '2',
          'name'=> 'JLM',
          'moves' => '800',
          'mode' => '5x5',
      ]);

      DB::table('ranking_slide')->insert([
          'id' => '3',
          'name'=> 'MJF',
          'moves' => '758',
          'mode' => '5x5',
      ]);

    }
}
