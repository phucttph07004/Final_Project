<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Notification,Schedule,Student,Classes,History_learned_class};
use Auth;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $data['notifications'] = Notification::where('is_active', 1)->orderBy('created_at','DESC')->limit(5)->get();
        return view('student.pages.index',$data);
    }

    public function schedule()
    {
        $schedules=array();
        if(Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->finish_date > now()){
            $schedules = Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->whereDate('time' , '>=', now())->paginate(10);
        }    
        $data['schedules'] = $schedules;
        return view('student.pages.schedule_learn.schedule_learn',$data);
    }

    public function attendance()
    {
        $data['schedules']=array();
        if(Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->finish_date > now()){
            $data['schedules'] = Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->get();
            $data['status'] = null;
            // foreach (Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->where('time' ,'<=', now())->get() as $value) {
            //     $test = [Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->where('time' ,'<=', now())->get()];
            //     // dd($test);
            //     if(array_search(Auth::guard('student')->user()->id,explode(',', $value->student_id)) === false)
            //         {
            //             $data['status'] =  $value; 
            //         }
            //     else{
            //         $data['status'] = null;  
            //     }
            // }
        }   
        return view('student.pages.attendance.attendance',$data);
    }

    public function history_learned_class()
    {
        $data['histories'] = History_learned_class::where('student_id',Auth::guard('student')->user()->id)->get();
        return view('student.pages.history.history',$data);
    }
}