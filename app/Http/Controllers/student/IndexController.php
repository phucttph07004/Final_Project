<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Notification,Schedule,Student,Classes};
use Auth;
use DB;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {  
        $class_id = Auth::guard('student')->user()->class_id;
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
        if(count($data['sessions']) <= 2/3 * count($data['number_of_sessions']) && count($data['feedback']) > 0){
            return view('student.pages.index',$data);   
        }
        else{
            return redirect('student/feedback');
        }
        
    }  
    public function schedule()
    {
        $schedules=array();
        if(Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->finish_date > now()){
            $schedules = Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->whereDate('time' , '>=', now())->paginate(10);
        }    
        $data['schedules'] = $schedules;
        $class_id = Auth::guard('student')->user()->class_id;
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
        if(count($data['sessions']) <= 2/3 * count($data['number_of_sessions']) && count($data['feedback']) > 0){
            return view('student.pages.schedule_learn.schedule_learn',$data);
        }
        else{
            return redirect('student/feedback');
        }
        
    }

    public function attendance()
    {
        $data['schedules']=array();
        if(Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->finish_date > now()){
            $data['schedules'] = Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->get();
            $data['status'] = null;
            $class_id = Auth::guard('student')->user()->class_id;
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
        if(count($data['sessions']) <= 2/3 * count($data['number_of_sessions']) && count($data['feedback']) > 0){
            return view('student.pages.attendance.attendance',$data);
        }
        else{
            return redirect('student/feedback');
        }
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
        
    }
}