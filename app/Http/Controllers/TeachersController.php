<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachersController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $teachers = DB::table('teachers')
            ->select(
                'teachers.id',
                'teachers.name',
                'teachers.image',
            )
            ->paginate(6);

        if ($request[('search_by')] == 'name') {
            $teachers = DB::table('teachers')
                ->select(
                    'teachers.id',
                    'teachers.name',
                    'teachers.image',
                )
                ->where('name', 'like', '%' . $search . '%')
                ->paginate(6);
        } else if ($request[('search_by')] == 'student') {
            $teachers = DB::table('teachers')
                ->select(
                    'teachers.id',
                    'teachers.name',
                    'teachers.image',
                    'students.name AS studentName',
                )
                ->Join('teacher_students', 'teachers.id', '=', 'teacher_students.teacher_id')
                ->Join('students', 'students.id', '=', 'teacher_students.student_id')
                ->where('students.name', 'like', '%' . $search . '%')
                ->paginate(6);
        } else if ($request[('search_by')] == 'graduate_thesis') {
            $teachers = DB::table('teachers')
                ->select(
                    'teachers.id',
                    'teachers.name',
                    'teachers.image',
                )
                ->leftjoin('graduate_theses', 'teachers.id', '=', 'graduate_theses.teacher_id')
                ->where('graduate_theses.topic', 'like', '%' . $search . '%')
                ->paginate(6);
        }

        return view('teachers.index', [
            'pageTitle' => 'Teachers list',
            'teachers' => $teachers
        ]);
    }
}

