<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            'name' => 'Doctor1',
            'email' => 'doctor1@mas.com',
            'contact' => '9800000011',
            'address' => 'Bharatpur, Nepal',
            'license' => 'AB1-11-XYZ-1',
            'specialization_id' => '1',
            'degree' => 'MBBS',
        ]);
        DB::table('doctors')->insert([
            'name' => 'Doctor2',
            'email' => 'doctor2@mas.com',
            'contact' => '9800000022',
            'address' => 'Bharatpur, Nepal',
            'license' => 'AB2-22-XYZ-2',
            'specialization_id' => '2',
            'degree' => 'MBBS',
        ]);
        DB::table('doctors')->insert([
            'name' => 'Doctor3',
            'email' => 'doctor3@mas.com',
            'contact' => '9800000033',
            'address' => 'Bharatpur, Nepal',
            'license' => 'AB3-33-XYZ-3',
            'specialization_id' => '3',
            'degree' => 'MBBS',
        ]);
        DB::table('doctors')->insert([
            'name' => 'Doctor4',
            'email' => 'doctor4@mas.com',
            'contact' => '9800000044',
            'address' => 'Bharatpur, Nepal',
            'license' => 'AB4-44-XYZ-4',
            'specialization_id' => '4',
            'degree' => 'MBBS',
        ]);
        DB::table('doctors')->insert([
            'name' => 'Doctor5',
            'email' => 'doctor5@mas.com',
            'contact' => '9800000055',
            'address' => 'Bharatpur, Nepal',
            'license' => 'AB5-55-XYZ-5',
            'specialization_id' => '5',
            'degree' => 'MBBS',
        ]);
        DB::table('doctors')->insert([
            'name' => 'Doctor6',
            'email' => 'doctor6@mas.com',
            'contact' => '9800000066',
            'address' => 'Bharatpur, Nepal',
            'license' => 'AB6-66-XYZ-6',
            'specialization_id' => '6',
            'degree' => 'MBBS',
        ]);
        DB::table('doctors')->insert([
            'name' => 'Doctor7',
            'email' => 'doctor7@mas.com',
            'contact' => '9800000077',
            'address' => 'Bharatpur, Nepal',
            'license' => 'AB7-77-XYZ-7',
            'specialization_id' => '7',
            'degree' => 'MBBS',
        ]);
        DB::table('doctors')->insert([
            'name' => 'Doctor8',
            'email' => 'doctor8@mas.com',
            'contact' => '9800000088',
            'address' => 'Bharatpur, Nepal',
            'license' => 'AB8-88-XYZ-8',
            'specialization_id' => '8',
            'degree' => 'MD',
        ]);
        DB::table('doctors')->insert([
            'name' => 'Doctor9',
            'email' => 'doctor9@mas.com',
            'contact' => '9800000099',
            'address' => 'Bharatpur, Nepal',
            'license' => 'AB9-99-XYZ-9',
            'specialization_id' => '5',
            'degree' => 'MD',
        ]);
        DB::table('doctors')->insert([
            'name' => 'Doctor10',
            'email' => 'doctor10@mas.com',
            'contact' => '9800000000',
            'address' => 'Bharatpur, Nepal',
            'license' => 'AB0-00-XYZ-10',
            'specialization_id' => '8',
            'degree' => 'MD',
        ]);
    }
}
