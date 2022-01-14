<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\GraduateThesis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $students = DB::table('students')
            ->select(
                'students.id',
                'students.name',
                'students.faculty_number',
                'graduate_theses.topic AS graduateThesisTopic'
            )
            ->leftjoin('graduate_theses', 'graduate_theses.id', '=', 'students.graduate_thesis_id')
            ->paginate(6);

        if ($request[('search_by')] == 'name') {
            $students = DB::table('students')
                ->select(
                    'students.id',
                    'students.name',
                    'students.faculty_number',
                    'students.graduate_thesis_id',
                    'graduate_theses.topic AS graduateThesisTopic'
                )
                ->leftjoin('graduate_theses', 'graduate_theses.id', '=', 'students.graduate_thesis_id')
                ->where('name', 'like', '%' . $search . '%')
                ->paginate(6);
        } else if ($request[('search_by')] == 'teacher') {
            $students = DB::table('students')
                ->select(
                    'students.id',
                    'students.name',
                    'students.faculty_number',
                    'students.graduate_thesis_id',

                    'teachers.name AS teacherName',
                    'graduate_theses.topic AS graduateThesisTopic'
                )
                ->Join('teacher_students', 'students.id', '=', 'teacher_students.student_id')
                ->Join('teachers', 'teachers.id', '=', 'teacher_students.teacher_id')
                ->join('graduate_theses', 'graduate_theses.id', '=', 'students.graduate_thesis_id')
                ->where('teachers.name', 'like', '%' . $search . '%')
                ->paginate(6);
        } else if ($request[('search_by')] == 'graduate_thesis') {
            $students = DB::table('students')
                ->select(
                    'students.id',
                    'students.name',
                    'students.faculty_number',
                    'students.graduate_thesis_id',

                    'graduate_theses.topic AS graduateThesisTopic'
                )
                ->leftjoin('graduate_theses', 'graduate_theses.id', '=', 'students.graduate_thesis_id')
                ->where('graduate_theses.topic', 'like', '%' . $search . '%')
                ->paginate(6);
        }

        return view('students.index', [
            'pageTitle' => 'Students list',
            'students' => $students
        ]);
    }
}
