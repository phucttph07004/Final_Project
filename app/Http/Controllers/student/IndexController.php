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

    public function attendence()
    {
        // $data=array();
        // $now = Carbon::now()->toDateString();
        if(Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->finish_date > now()){
            $data['schedules'] = Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->get();
            $data['status'] = Schedule::where('student_id', '<>' , Auth::guard('student')->user()->id)->where('time' ,'<=', now())->get();
            // foreach (Schedule::all() as $value) {
            //     if(array_search(Auth::guard('student')->user()->id,explode(',', $value->student_id)) === true){
            //         $data['status']= $value;
            //     }
            // }
        }   
        return view('student.pages.attendence.attendence',$data);
    }
}