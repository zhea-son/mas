<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            'day' => 'Sunday', 
        ]);
        DB::table('days')->insert([
            'day' => 'Monday', 
        ]);
        DB::table('days')->insert([
            'day' => 'Tuesday', 
        ]);
        DB::table('days')->insert([
            'day' => 'Wednesday', 
        ]);
        DB::table('days')->insert([
            'day' => 'Thursday', 
        ]);
        DB::table('days')->insert([
            'day' => 'Friday', 
        ]);
        DB::table('days')->insert([
            'day' => 'Saturday', 
        ]);
    }
}
