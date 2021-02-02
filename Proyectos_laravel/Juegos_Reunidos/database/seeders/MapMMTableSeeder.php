<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapMMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('map_m_m')->insert([
            'id' => '1',
            'name' => 'Mundo1',
            'image' => 'Mundo1',
        ]);

        DB::table('map_m_m')->insert([
            'id' => '2',
            'name' => 'Mundo2',
            'image' => 'Mundo2',
        ]);

        DB::table('map_m_m')->insert([
            'id' => '3',
            'name' => 'Mundo3',
            'image' => 'Mundo3',
        ]);
    }
}
