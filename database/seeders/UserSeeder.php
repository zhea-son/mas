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
            'contact' => '9818632951',
            'address' => 'Rajahar',
            'password' => Hash::make('password'),
            'role'=> 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Alisha Shrestha',
            'email' => 'alisha@mas.com',
            'contact' => '9801122356',
            'address' => 'Kawasati',
            'password' => Hash::make('password'),
            'role'=> 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Pretty Thapa',
            'email' => 'pretty@mas.com',
            'contact' => '9847433811',
            'address' => 'Rajahar',
            'password' => Hash::make('password'),
            'role'=> 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Seema Bhusal',
            'email' => 'seema@mas.com',
            'contact' => '9801122334',
            'address' => 'Kawasati',
            'password' => Hash::make('password'),
            'role'=> 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Prabesh Thapa',
            'email' => 'prabesh@mas.com',
            'contact' => '9821346789',
            'address' => 'Imadol',
            'password' => Hash::make('password'),
            'role'=> 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Roshan Poudel',
            'email' => 'roshan@mas.com',
            'contact' => '9821346001',
            'address' => 'Amarapuri',
            'password' => Hash::make('password'),
            'role'=> 0,
        ]);
    }
}
