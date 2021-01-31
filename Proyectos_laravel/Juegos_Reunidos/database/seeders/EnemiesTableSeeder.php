<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnemiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enemies')->insert([
            'id' => '1',
            'name' => 'Crawler',
            'image' => 'Crawler',
            'atk_speed' => '1',
            'atk_damage' => '10',
            'route' => '1',
            'health' => '100',
            'bullet_type' => '2',
        ]);

        DB::table('enemies')->insert([
            'id' => '2',
            'name' => 'Worm',
            'image' => 'Worm',
            'atk_speed' => '2',
            'atk_damage' => '7',
            'route' => '2',
            'health' => '50',
            'bullet_type' => '1',
        ]);

        DB::table('enemies')->insert([
            'id' => '3',
            'name' => 'Dropper',
            'image' => 'Dropper',
            'atk_speed' => '1',
            'atk_damage' => '15',
            'route' => '3',
            'health' => '100',
            'bullet_type' => '3',

        ]);
    }
}
