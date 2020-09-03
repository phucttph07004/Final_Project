<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Notification,Schedule,Student,Classes};
use Auth;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $data['notifications'] = Notification::where('is_active', 1)->limit(5)->get();
        return view('student.pages.index',$data);
    }

    public function schedule()
    {
        $data=array();
        if(Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->finish_date > now()){
            $data['schedules'] = Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->whereDate('time' , '>=', now())->get();
        }    
        return view('student.pages.schedule_learn.schedule_learn',$data);
    }

    public function attendance()
    {
        if(Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->finish_date > now()){
            $data['schedules'] = Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->get();
            $data['status'] = null;
            foreach (Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->where('time' ,'<=', now())->get() as $value) {
                if(array_search(Auth::guard('student')->user()->id,explode(',', $value->student_id)) === false)
                    {
                        $data['status'] =  $value; 
                    }
                else{
                    $data['status'] = null;  
                }
            }
        }   
        return view('student.pages.attendance.attendance',$data);
    }
}