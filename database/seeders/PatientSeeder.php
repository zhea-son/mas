<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'name' => 'Prem Bdr. Thapa',
            'dob' => '1972-08-12',
            'contact' => '9847483351',
            'address' => 'Rajahar',
            'relation' => 'Father',
            'user_id'=> 2,
        ]);
        DB::table('patients')->insert([
            'name' => 'Reshu Thapa',
            'dob' => '1979-08-15',
            'contact' => '9818632950',
            'address' => 'Rajahar',
            'relation' => 'Mother',
            'user_id'=> 2,
        ]);
        DB::table('patients')->insert([
            'name' => 'Prajal Thapa',
            'dob' => '2008-08-15',
            'contact' => '9818632331',
            'address' => 'Rajahar',
            'relation' => 'Brother',
            'user_id'=> 4,
        ]);
        DB::table('patients')->insert([
            'name' => 'Shree Shrestha',
            'dob' => '1950-11-15',
            'contact' => '981864004',
            'address' => 'Danda',
            'relation' => 'Grand-Father',
            'user_id'=> 3,
        ]);
        DB::table('patients')->insert([
            'name' => 'Chetana Shrestha',
            'dob' => '1982-05-15',
            'contact' => '9812222164',
            'address' => 'Kawasati',
            'relation' => 'Mother',
            'user_id'=> 3,
        ]);
        DB::table('patients')->insert([
            'name' => 'Puran Thapa',
            'dob' => '1977-05-26',
            'contact' => '9812200111',
            'address' => 'Imadol',
            'relation' => 'Father',
            'user_id'=> 6,
        ]);
        DB::table('patients')->insert([
            'name' => 'Priyanka Thapa',
            'dob' => '1981-07-29',
            'contact' => '9822101111',
            'address' => 'Imadol',
            'relation' => 'Mother',
            'user_id'=> 6,
        ]);
        DB::table('patients')->insert([
            'name' => 'Prabash Thapa',
            'dob' => '2016-02-21',
            'contact' => '9812200111',
            'address' => 'Imadol',
            'relation' => 'Brother',
            'user_id'=> 6,
        ]);
    }
}
