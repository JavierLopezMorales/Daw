<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ships::truncate(){ // Vacia la tabla antes de rellenarla
            DB::table('ships') -> insert([
                'name' => 'Rath V-1',
                'image' => 'Rath V-1',
                'atk_speed' => '1',
                'atk_damage' => '10',
                'speed' => '1',
                'health' => '100',
                'bullet_type' => '1',
            ]);

        }
    }
}
