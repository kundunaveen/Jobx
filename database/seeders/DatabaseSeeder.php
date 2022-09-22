<?php

namespace Database\Seeders;

use App\Models\MasterAttribute;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            UserTableSeeder::class,
            RoleUserTableSeeder::class,
            MasterAttributeCategorySeeder::class,
            MasterAttributeSeeder::class,
            JobSkillSeeder::class
        ]);
    }
}
