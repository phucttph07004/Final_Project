<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Student;
class ProfileController extends Controller
{
    public function index()
    {
        $data['profile'] = Student::find(Auth::guard('student')->user()->id);
        return view('student.pages.profile.profile',$data);
    }
}
