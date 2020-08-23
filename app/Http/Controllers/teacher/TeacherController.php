<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.pages.index');
    }

    public function schedule()
    {
        return view('teacher.pages.schedule_teach.schedule_teach');
    }
}
