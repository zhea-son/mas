<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->insert([
            'specialization' => 'Ophthalmologist',
            'organ' => 'Eye',
        ]);
        DB::table('specializations')->insert([
            'specialization' => 'Cardiologist',
            'organ' => 'Heart',
        ]);
        DB::table('specializations')->insert([
            'specialization' => 'Dermatologist',
            'organ' => 'Skin',
        ]);
        DB::table('specializations')->insert([
            'specialization' => 'Hematologist',
            'organ' => 'Blood',
        ]);
        DB::table('specializations')->insert([
            'specialization' => 'Medicine',
            'organ' => 'Body',
        ]);
        DB::table('specializations')->insert([
            'specialization' => 'Nephrologist',
            'organ' => 'Kidney',
        ]);
        DB::table('specializations')->insert([
            'specialization' => 'Neurologist',
            'organ' => 'Neuro',
        ]);
        DB::table('specializations')->insert([
            'specialization' => 'Psychiatrists',
            'organ' => 'Brain',
        ]);
        DB::table('specializations')->insert([
            'specialization' => 'Surgeon',
            'organ' => 'Body',
        ]);
    }
}
