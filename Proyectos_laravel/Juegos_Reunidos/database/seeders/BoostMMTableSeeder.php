<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoostMMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boost_m_m')->insert([
            'id' => '1',
            'name' => 'player-speed-boost',
            'amount' => '0.1',
            'icon' => 'player-speed-boost.png',
            'selector' => 'player-speed',
        ]);
        DB::table('boost_m_m')->insert([
            'id' => '2',
            'name' => 'health-boost',
            'amount' => '5',
            'icon' => 'health-boost.png',
            'selector' => 'health',
        ]);
        DB::table('boost_m_m')->insert([
            'id' => '3',
            'name' => 'bullet-speed-boost',
            'amount' => '0.1',
            'icon' => 'bullet-speed-boost.png',
            'selector' => 'bullet-speed',
        ]);
        DB::table('boost_m_m')->insert([
            'id' => '4',
            'name' => 'shield-boost',
            'amount' => '5', //Segundos
            'icon' => 'shield-boost.png',
            'selector' => 'shield',
        ]);
        DB::table('boost_m_m')->insert([
            'id' => '5',
            'name' => 'double-points-boost',
            'amount' => '10', //Segundos
            'icon' => 'double-points-boost.png',
            'selector' => 'double-points',
        ]);
    }
}
