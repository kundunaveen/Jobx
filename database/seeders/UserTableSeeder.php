<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'first_name' => 'David',
                'last_name' => 'Theodora',
                'email' => 'david@devacaturemaker.nl',
                'password' => Hash::make('welcome@123')
            ],
            [
                'id' => 2,
                'first_name' => 'Saman',
                'last_name' => 'Mahjoubpour',
                'email' => 'sammy@devacaturemaker.nl',
                'password' => Hash::make('welcome@123')
            ],
        ]);
    }
}
