<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ShipsTableSeeder::class);
        $this->call(EnemiesTableSeeder::class);
        $this->call(RankingMMTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RankingSTSeeder::class);
        $this->call(TematicasSTTableSeeder::class);
        $this->call(BoostMMTableSeeder::class);
        $this->call(RankingSGSeeder::class);
        $this->call(ThematicSGSeeder::class);
    }
}
