<?php

namespace Database\Seeders;

use App\Models\GraduateThesis;
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
            UserTableSeeder::class,
            TeachersTableSeeder::class,
            GraduateThesesTableSeeder::class,
            StudentsTableSeeder::class,
        ]);
    }
}
