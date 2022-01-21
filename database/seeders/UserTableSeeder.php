<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->get()->count() === 0) {
            DB::table('users')->insert(
                [
                    [
                        'name' => Str::random(10),
                        'email' => 'admin@admin.admin',
                        'password' => Hash::make('admin'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                ]
            );
        } else {
            echo "\r\n\e[31m Users table is not empty. \r\n";
        }
    }
}
