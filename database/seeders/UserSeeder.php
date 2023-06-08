<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mas.com',
            'contact' => '056-533539',
            'address' => 'Bharatpur, Nepal',
            'password' => Hash::make('password'),
            'role'=> 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Priya Thapa',
            'email' => 'priya@mas.com',
            'contact' => '9809229946',
            'address' => 'Bharatpur, Nepal',
            'password' => Hash::make('password'),
            'role'=> 0,
        ]);
    }
}
