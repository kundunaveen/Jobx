<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_attributes')->insert([
            [
                'id' => 1,
                'master_attribute_category_id' => 1,
                'value' => 'Male'
            ],
            [
                'id' => 2,
                'master_attribute_category_id' => 1,
                'value' => 'Female'
            ],
            [
                'id' => 3,
                'master_attribute_category_id' => 1,
                'value' => 'Other'
            ],
            [
                'id' => 4,
                'master_attribute_category_id' => 2,
                'value' => 'English'
            ],
            [
                'id' => 5,
                'master_attribute_category_id' => 2,
                'value' => 'Spanish'
            ],
            [
                'id' => 6,
                'master_attribute_category_id' => 2,
                'value' => 'German'
            ],
            [
                'id' => 7,
                'master_attribute_category_id' => 2,
                'value' => 'Russian'
            ],
            [
                'id' => 8,
                'master_attribute_category_id' => 2,
                'value' => 'Hindi'
            ],
            [
                'id' => 9,
                'master_attribute_category_id' => 2,
                'value' => 'French'
            ],
            [
                'id' => 10,
                'master_attribute_category_id' => 2,
                'value' => 'Korean'
            ],
            [
                'id' => 11,
                'master_attribute_category_id' => 2,
                'value' => 'Italian'
            ],
            [
                'id' => 12,
                'master_attribute_category_id' => 2,
                'value' => 'Hindi'
            ],
            [
                'id' => 13,
                'master_attribute_category_id' => 2,
                'value' => 'Urdu'
            ],
            [
                'id' => 14,
                'master_attribute_category_id' => 2,
                'value' => 'Chinese'
            ],
            [
                'id' => 15,
                'master_attribute_category_id' => 3,
                'value' => 'Beginner'
            ],
            [
                'id' => 16,
                'master_attribute_category_id' => 3,
                'value' => 'Skilled'
            ],
            [
                'id' => 17,
                'master_attribute_category_id' => 3,
                'value' => 'Intermediate'
            ],
            [
                'id' => 18,
                'master_attribute_category_id' => 3,
                'value' => 'Proficient'
            ],
            [
                'id' => 19,
                'master_attribute_category_id' => 3,
                'value' => 'Expert'
            ],
            [
                'id' => 20,
                'master_attribute_category_id' => 4,
                'value' => 'Aerospace'
            ],
            [
                'id' => 21,
                'master_attribute_category_id' => 4,
                'value' => 'Agriculture'
            ],
            [
                'id' => 22,
                'master_attribute_category_id' => 4,
                'value' => 'Computer and technology'
            ],
            [
                'id' => 23,
                'master_attribute_category_id' => 4,
                'value' => 'Construction'
            ],
            [
                'id' => 24,
                'master_attribute_category_id' => 4,
                'value' => 'Education'
            ],
            [
                'id' => 25,
                'master_attribute_category_id' => 4,
                'value' => 'Energy'
            ],
            [
                'id' => 26,
                'master_attribute_category_id' => 4,
                'value' => 'Entertainment'
            ],
            [
                'id' => 27,
                'master_attribute_category_id' => 4,
                'value' => 'Fashion'
            ],
            [
                'id' => 28,
                'master_attribute_category_id' => 4,
                'value' => 'Finance and economic'
            ],
            [
                'id' => 29,
                'master_attribute_category_id' => 4,
                'value' => 'Food and beverage'
            ],
            [
                'id' => 30,
                'master_attribute_category_id' => 4,
                'value' => 'Health care'
            ],
            [
                'id' => 31,
                'master_attribute_category_id' => 4,
                'value' => 'Hospitality'
            ],
            [
                'id' => 32,
                'master_attribute_category_id' => 4,
                'value' => 'Manufacturing'
            ],
            [
                'id' => 33,
                'master_attribute_category_id' => 4,
                'value' => 'Media and news'
            ],
            [
                'id' => 34,
                'master_attribute_category_id' => 4,
                'value' => 'Mining'
            ],
            [
                'id' => 35,
                'master_attribute_category_id' => 4,
                'value' => 'Pharmaceutical'
            ],
            [
                'id' => 36,
                'master_attribute_category_id' => 4,
                'value' => 'Pharmaceutical'
            ],
            [
                'id' => 37,
                'master_attribute_category_id' => 4,
                'value' => 'Transportation'
            ],
            [
                'id' => 38,
                'master_attribute_category_id' => 5,
                'value' => 'Beginner'
            ],
            [
                'id' => 39,
                'master_attribute_category_id' => 5,
                'value' => 'Intermediate'
            ],
            [
                'id' => 40,
                'master_attribute_category_id' => 5,
                'value' => 'Expert'
            ],
            [
                'id' => 41,
                'master_attribute_category_id' => 7,
                'value' => 'Single'
            ],
            [
                'id' => 42,
                'master_attribute_category_id' => 7,
                'value' => 'Married'
            ],
            [
                'id' => 43,
                'master_attribute_category_id' => 8,
                'value' => '1'
            ],
            [
                'id' => 44,
                'master_attribute_category_id' => 8,
                'value' => '2'
            ],
            [
                'id' => 45,
                'master_attribute_category_id' => 8,
                'value' => '3'
            ],
            [
                'id' => 46,
                'master_attribute_category_id' => 6,
                'value' => 'Bachelor'
            ],
            [
                'id' => 47,
                'master_attribute_category_id' => 6,
                'value' => 'Master'
            ],
            [
                'id' => 48,
                'master_attribute_category_id' => 6,
                'value' => 'Phd'
            ],
            [
                'id' => 49,
                'master_attribute_category_id' => 9,
                'value' => 'Full Time'
            ],
            [
                'id' => 50,
                'master_attribute_category_id' => 9,
                'value' => 'Part Time'
            ],
            [
                'id' => 51,
                'master_attribute_category_id' => 9,
                'value' => 'Contract Based'
            ],
            [
                'id' => 52,
                'master_attribute_category_id' => 10,
                'value' => 'PENDING'
            ],
            [
                'id' => 52,
                'master_attribute_category_id' => 10,
                'value' => 'APPLIED'
            ],
            [
                'id' => 52,
                'master_attribute_category_id' => 10,
                'value' => 'IN REVIEW'
            ],
            [
                'id' => 52,
                'master_attribute_category_id' => 10,
                'value' => 'ACCEPTED'
            ],
            [
                'id' => 52,
                'master_attribute_category_id' => 10,
                'value' => 'REJECTED'
            ],
        ]);
    }
}
