<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Notification,Schedule,Student,Classes};
use Auth;
use DB;
use Carbon\Carbon;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        $data['student_id']=Auth::guard('student')->id;
        $feedback = Feedback::create($data);
        return redirect()->route('home.student');
        
    }  
   
}