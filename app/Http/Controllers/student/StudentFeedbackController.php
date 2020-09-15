<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Arr;
use Auth;
use App\Models\{Student,Feedback};

class StudentFeedbackController extends Controller
{
    public function getFormFeedback()
    {
        return view('student.pages.feedback.feedback');
    }

    public function postFormFeedback(Request $request)
    {
        $data = Arr::except($request->all(),['_token']);
        Feedback::create($data);
        return redirect()->route('home.student');
    }
}
 