<?php

namespace Database\Seeders;

use App\Models\Cms;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cms_data = [
            [
                'title' => 'Setting',
                'meta_keyword' => 'Setting',
                'meta_description' => 'Setting',
                'content' => '{"contact_number":"+919876543214","contact_email":"info@devacaturemaker.nl"}',
                'slug' => 'setting',

            ]
        ];

        DB::transaction(function () use ($cms_data) {
            Cms::truncate();
            foreach ($cms_data as $data) {
                Cms::create($data);
            }
        });
    }
}
