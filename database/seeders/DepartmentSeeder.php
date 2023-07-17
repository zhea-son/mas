<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'department' => "General Medicine",
            'room_no' => "101",
        ]);
        DB::table('departments')->insert([
            'department' => "Dentistry",
            'room_no' => "102",
        ]);
        DB::table('departments')->insert([
            'department' => "Opthalmology",
            'room_no' => "103",
        ]);
        DB::table('departments')->insert([
            'department' => "Dietician",
            'room_no' => "104",
        ]);
        DB::table('departments')->insert([
            'department' => "Gasteroentrology",
            'room_no' => "105",
        ]);
        DB::table('departments')->insert([
            'department' => "Gynaecology",
            'room_no' => "106",
        ]);
        DB::table('departments')->insert([
            'department' => "Neurology",
            'room_no' => "201",
        ]);
        DB::table('departments')->insert([
            'department' => "Orthopedic",
            'room_no' => "202",
        ]);
        DB::table('departments')->insert([
            'department' => "Pediatrics",
            'room_no' => "203",
        ]);
        DB::table('departments')->insert([
            'department' => "Psychiatric",
            'room_no' => "204",
        ]);
        DB::table('departments')->insert([
            'department' => "Pulmonary",
            'room_no' => "205",
        ]);
        DB::table('departments')->insert([
            'department' => "Urology",
            'room_no' => "206",
        ]);
        DB::table('departments')->insert([
            'department' => "ENT",
            'room_no' => "301",
        ]);
        DB::table('departments')->insert([
            'department' => "Dermatology",
            'room_no' => "302",
        ]);
        DB::table('departments')->insert([
            'department' => "Cardiology",
            'room_no' => "303",
        ]);
    }
}
