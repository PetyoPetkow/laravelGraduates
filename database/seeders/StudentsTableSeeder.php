<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('students')->get()->count()===0){
            $records =
            [
                ['Ivan Ivanov', strval(mt_rand(1000000, 9999999)), DB::table('graduate_theses')->where('topic', '=', 'Subtitles project')->select('id')->first(),],
                ['Stamat Stamatov', strval(mt_rand(1000000, 9999999)), DB::table('graduate_theses')->where('topic', '=', 'Renting project')->select('id')->first(),],
                ['Georgi Georgiev', strval(mt_rand(1000000, 9999999)), DB::table('graduate_theses')->where('topic', '=', 'Movies project')->select('id')->first(),],
                ['Stanislav Stanislavov', strval(mt_rand(1000000, 9999999)), DB::table('graduate_theses')->where('topic', '=', 'Theatre plays project')->select('id')->first(),],
                ['Marin Marinov', strval(mt_rand(1000000, 9999999)), DB::table('graduate_theses')->where('topic', '=', 'Sport events project')->select('id')->first(),],
            ];

            $now = date('Y-m-d H:i:s');

            for ($index = 0;
                 $index < count($records);
                 $index++) {
                DB::table('students')->insert(
                    array(
                        'name' => $records[$index][0],
                        'faculty_number' => $records[$index][1],
                        'graduate_thesis_id' => $records[$index][2]->id,
                        'created_at' => $now,
                        'updated_at' => $now
                    )
                );
            }
        }
    }
}
