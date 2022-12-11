<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'röpdolgozat',
            'point_up' => 15,
            'point_down' => 3,
        ]);
        DB::table('users')->insert([
            'name' => 'dolgozat/témazáró',
            'point_up' => 25,
            'point_down' => 5,
        ]);
        DB::table('users')->insert([
            'name' => 'próbaérettségi',
            'point_up' => 40,
            'point_down' => 8,
        ]);
    }
}
