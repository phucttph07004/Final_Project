<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use Arr;
use Auth;
use App\Models\{Student,Feedback,Notification,User};

class StudentFeedbackController extends Controller
{
    public function getFormFeedback()
    {  
        
        $class_id = Auth::guard('student')->user()->class_id;
        $teacher_info = DB::table('users')
            ->join('classes', 'classes.teacher_id', '=', 'users.id')
            ->where('classes.id', $class_id)
            ->select('teacher_id','fullname','email','phone','avatar')
            ->first();
        $id = Auth::guard('student')->user()->id;
        $data['feedback'] = DB::table('feedback')
                                ->where('student_id', $id)
                                ->where('class_id', $class_id)
                                ->get();
        $data['sessions'] = DB::table('schedules')
                                ->where('class_id', $class_id)
                                ->whereNotNull('student_id')
                                ->get();
        
        $data['number_of_sessions'] = DB::table('schedules')
                                        ->where('class_id', $class_id)
                                        ->get();
                 
        $data['notifications'] = Notification::where('status', 1)->limit(5)->get();
        if(count($data['sessions']) <= 2/3 * count($data['number_of_sessions'])){
            return redirect()->route('home.student',$data); 
        }
        else if(count($data['feedback']) > 0){
            return redirect()->route('home.student',$data); 
        }
        else{
            $data['teacher_info'] = DB::table('users')
            ->join('classes', 'classes.teacher_id', '=', 'users.id')
            ->where('classes.id', $class_id)
            ->select('teacher_id','fullname','email','phone','avatar')
            ->first();
            
            return view('student.pages.feedback.feedback',$data);
        }
        
    }  
    public function postFormFeedback(Request $request)
    {
        $data = Arr::except($request->all(),['_token']);
        Feedback::create($data);
        return redirect()->route('home.student');
        
    }  
}
 