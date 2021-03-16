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
        ]);

        DB::table('ranking_m_m')->insert([
            'id' => '2',
            'name' => 'FRK',
            'score' => '1100',
        ]);
        DB::table('ranking_m_m')->insert([
            'id' => '3',
            'name' => 'MLN',
            'score' => '1000',
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

        DB::table('ranking_m_m')->insert([
            'id' => '8',
            'name' => 'AWD',
            'score' => '11100',
        ]);
        DB::table('ranking_m_m')->insert([
            'id' => '9',
            'name' => 'ZZZ',
            'score' => '29000',
        ]);
        DB::table('ranking_m_m')->insert([
            'id' => '10',
            'name' => 'GOD',
            'score' => '23000',
        ]);
    }
}
