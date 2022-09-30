<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterAttributeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_attribute_categories')->insert([
            [
                'id' => 1,
                'name' => 'Gender'
            ],
            [
                'id' => 2,
                'name' => 'Languages'
            ],
            [
                'id' => 3,
                'name' => 'Language Levels'
            ],
            [
                'id' => 4,
                'name' => 'Industries'
            ],
            [
                'id' => 5,
                'name' => 'Experience Levels'
            ],
            [
                'id' => 6,
                'name' => 'Degree Levels'
            ],
            [
                'id' => 7,
                'name' => 'Marital Status'
            ],
            [
                'id' => 8,
                'name' => 'Notice Period'
            ],
            [
                'id' => 9,
                'name' => 'Job Type'
            ],
        ]);
    }
}
