<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::insert([
            [
                'gender_id' => 1,
                'gender_desc' => 'Male'],
            [
                'gender_id' => 2,
                'gender_desc' => 'Female'
            ]
        ]);
    }
}
