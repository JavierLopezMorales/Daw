<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankingMMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranking_m_m')->insert([
            'id' => '1',
            'name' => 'JLM',
            'score' => '1200',
            'level' => '1',
        ]);

        DB::table('ranking_m_m')->insert([
            'id' => '2',
            'name' => 'FRK',
            'score' => '1100',
            'level' => '2',
        ]);

        DB::table('ranking_m_m')->insert([
            'id' => '3',
            'name' => 'MLN',
            'score' => '1000',
            'level' => '3',

        ]);
    }
}
