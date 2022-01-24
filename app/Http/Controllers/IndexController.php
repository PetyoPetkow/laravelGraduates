<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        //Get data from DB in here and pass it to the view

        return view('index.index', [
            'title' => 'Graduate Theses project',
            'text' => '<p style="margin:100px"> This site is a platform for saving the information about students, their teachers and Graduate theses they have to do. Each student has many teachers and 1 graduate thesis which has a unique topic. You can search student and teachers by name, graduate thesis, and name of teacher for students and name of student for teachers. </p>'
        ]);
    }
}
