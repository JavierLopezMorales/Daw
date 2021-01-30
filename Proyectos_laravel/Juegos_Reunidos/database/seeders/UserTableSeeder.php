<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('users')->insert([
           'id' => '1',
           'name' => 'Manuel',
           'email' => 'manolopez90@gmail.com',
           'password' => 'Manuel01',
       ]);

       DB::table('users')->insert([
         'id' => '2',
         'name' => 'Javier',
         'email' => 'javierLopez@gmail.com',
         'password' => 'Javier01',
       ]);

       DB::table('users')->insert([
         'id' => '3',
         'name' => 'David',
         'email' => 'DavidBlanes@gmail.com',
         'password' => 'David01',
       ]);



   }
}
