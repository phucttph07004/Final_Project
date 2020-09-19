<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Notification,Schedule,Student,Classes,History_learned_class};
use Auth;
use DB;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {  
        $data['notifications'] = Notification::where('status', 1)->limit(5)->get();
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
            $data['schedules'] = Schedule::where("class_id",Student::find(Auth::guard('student')->user()->id)->class_id)->paginate(10);
            
            $data['pasts'] = Schedule::where('time','<', now())->where('class_id',Student::find(Auth::guard('student')->user()->id)->class_id)->get();
            $sche = null;
            $i = 1;
            foreach(Schedule::where('class_id',Student::find(Auth::guard('student')->user()->id)->class_id)->get() as $value){
                
                if($value->student_id != null){
                    $sche .= $value->student_id.',';
                }
            
            }
        $schedule = rtrim($sche,',');
        $data['schedule'] = explode(',',$schedule);
        }   
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
        
    }
    public function history_learned_class()
    {
        $data['histories'] = History_learned_class::where('student_id',Auth::guard('student')->user()->id)->get();
        return view('student.pages.history.history',$data);
    }
}