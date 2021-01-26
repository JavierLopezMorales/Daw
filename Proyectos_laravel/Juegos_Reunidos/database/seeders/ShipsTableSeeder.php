<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        DB::table('ships')->insert([
            'id' => '1',
            'name' => 'Rath V-1',
            'image' => 'Rath V-1',
            'atk_speed' => '1',
            'atk_damage' => '10',
            'speed' => '100',
            'health' => '100',
            'bullet_type' => '1',
        ]);

        DB::table('ships')->insert([
            'id' => '2',
            'name' => 'Yian V-1',
            'image' => 'Yian V-1',
            'atk_speed' => '2',
            'atk_damage' => '7',
            'speed' => '125',
            'health' => '50',
            'bullet_type' => '2',
        ]);

        DB::table('ships')->insert([
            'id' => '3',
            'name' => 'Garuga V-1',
            'image' => 'Garuga V-1',
            'atk_speed' => '0.5',
            'atk_damage' => '15',
            'speed' => '75',
            'health' => '150',
            'bullet_type' => '3',
        ]);


        
    }
}
