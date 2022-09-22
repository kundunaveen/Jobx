<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class JobSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_skills')->insert([
            [
                'id' => 1,
                'industry_id' => 22,
                'skill' => 'Laravel'
            ],
            [
                'id' => 2,
                'industry_id' => 22,
                'skill' => 'Python'
            ],
            [
                'id' => 3,
                'industry_id' => 22,
                'skill' => 'Node JS'
            ],
            [
                'id' => 4,
                'industry_id' => 22,
                'skill' => 'React JS'
            ],
            [
                'id' => 5,
                'industry_id' => 22,
                'skill' => 'Angular'
            ],
            [
                'id' => 6,
                'industry_id' => 22,
                'skill' => 'Ionic'
            ],
            [
                'id' => 7,
                'industry_id' => 22,
                'skill' => 'Vue JS'
            ],
            [
                'id' => 8,
                'industry_id' => 22,
                'skill' => 'Html/CSS/Bootstrap/Tailwind'
            ],
            [
                'id' => 9,
                'industry_id' => 22,
                'skill' => 'Android'
            ],
            [
                'id' => 10,
                'industry_id' => 22,
                'skill' => 'IOS'
            ],
            [
                'id' => 11,
                'industry_id' => 22,
                'skill' => 'Java'
            ],
            [
                'id' => 12,
                'industry_id' => 22,
                'skill' => 'C#'
            ],
            [
                'id' => 13,
                'industry_id' => 22,
                'skill' => '.NET'
            ],
        ]);
    }
}
