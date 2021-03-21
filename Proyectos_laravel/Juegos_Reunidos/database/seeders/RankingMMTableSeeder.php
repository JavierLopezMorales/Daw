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
            'score' => '42000',
        ]);

        DB::table('ranking_m_m')->insert([
            'id' => '2',
            'name' => 'FRK',
            'score' => '10100',
        ]);
        DB::table('ranking_m_m')->insert([
            'id' => '3',
            'name' => 'MLN',
            'score' => '15400',
        ]);
        DB::table('ranking_m_m')->insert([
            'id' => '4',
            'name' => 'DGT',
            'score' => '10000',
        ]);
        DB::table('ranking_m_m')->insert([
            'id' => '5',
            'name' => 'RTL',
            'score' => '12100',
        ]);
        DB::table('ranking_m_m')->insert([
            'id' => '6',
            'name' => 'POS',
            'score' => '9000',
        ]);
        DB::table('ranking_m_m')->insert([
            'id' => '7',
            'name' => 'ERT',
            'score' => '39800',
        ]);
    }
}
