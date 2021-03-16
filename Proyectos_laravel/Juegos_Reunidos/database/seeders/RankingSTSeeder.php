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
          'moves' => '1000',
          'date' => '2021/01/23',
          'mode' => '3',
      ]);

      DB::table('ranking_slide')->insert([
          'id' => '2',
          'name'=> 'JLM',
          'moves' => '800',
          'date' => '2021/01/22',
          'mode' => '3',
      ]);

      DB::table('ranking_slide')->insert([
          'id' => '3',
          'name'=> 'AAA',
          'moves' => '256',
          'date' => '2021/01/24',
          'mode' => '3',
      ]);

    }
}
