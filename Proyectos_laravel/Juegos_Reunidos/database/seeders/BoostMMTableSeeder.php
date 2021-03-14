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
        ]);
        DB::table('boost_m_m')->insert([
            'id' => '2',
            'name' => 'health-boost',
            'amount' => '0.1',
            'icon' => 'health-boost.png',
        ]);
        DB::table('boost_m_m')->insert([
            'id' => '3',
            'name' => 'bullet-speed-boost',
            'amount' => '0.1',
            'icon' => 'bullet-speed-boost.png',
        ]);
        DB::table('boost_m_m')->insert([
            'id' => '4',
            'name' => 'health-boost',
            'amount' => '5',
            'icon' => 'health-boost.png',
        ]);
        DB::table('boost_m_m')->insert([
            'id' => '5',
            'name' => 'shield-boost',
            'amount' => '5', //Segundos
            'icon' => 'shield-boost.png',
        ]);
        DB::table('boost_m_m')->insert([
            'id' => '6',
            'name' => 'double-points-boost',
            'amount' => '10', //Segundos
            'icon' => 'double-points-boost.png',
        ]);
    }
}
