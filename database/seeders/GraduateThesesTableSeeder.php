<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GraduateThesesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('graduate_theses')->get()->count() === 0) {

            $records = [
                ['Subtitles project', DB::table('teachers')->where('name', '=', 'Georgi Ivanov')->select('id')->first(),],
                ['Renting project', DB::table('teachers')->where('name', '=', 'Galq Ivanova')->select('id')->first(),],
                ['Movies project', DB::table('teachers')->where('name', '=', 'Galq Ivanova')->select('id')->first(),],
                ['Theatre plays project', DB::table('teachers')->where('name', '=', 'Slavqn Ivanov')->select('id')->first(),],
                ['Sport events project', DB::table('teachers')->where('name', '=', 'Georgi Ivanov')->select('id')->first(),],
            ];

            $now = date('Y-m-d H:i:s');

            for ($index = 0;
                 $index < count($records);
                 $index++) {
                DB::table('graduate_theses')->insert(
                    array(
                        'topic' => $records[$index][0],
                        'teacher_id' => $records[$index][1]->id,
                        'created_at' => $now,
                        'updated_at' => $now
                    )
                );
            }
        }
    }
}

