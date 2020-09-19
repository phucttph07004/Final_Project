<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Classes,User,Schedule,Student};
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Collection;
class TeacherController extends Controller
{
    public function index()
    {
        $data['classes'] = Classes::where('teacher_id', Auth::user()->id)->get();
        $data['schedules'] = Schedule::where("teacher_id",Auth::user()->id)->whereDate('time',now())->get();
        
        // dd(Schedule::where('time','<', now())->where('class_id',11)->get());
        
        $data['pasts'] = Schedule::where('time','<', now())->get();

        // foreach (Schedule::where('class_id', 11)->get() as $value ) {
        //         if( $value->time < now() && $value->id == 11 ){
        //             $data['pasts'][] = Collection::make($value);
        //             dd($value->count('time'));
        //         }
        //         else{
        //         }
        // };

        return view('teacher.pages.schedule_teach.schedule_teach',$data);
    }

    public function schedule()
    {
        $data['classes'] = Classes::where('teacher_id', Auth::user()->id)->get();
        $data['schedules'] = Schedule::where("teacher_id",Auth::user()->id)->whereDate('time',now())->get();
        
        // dd(Schedule::where('time','<', now())->where('class_id',11)->get());
        
        $data['pasts'] = Schedule::where('time','<', now())->get();

        // foreach (Schedule::where('class_id', 11)->get() as $value ) {
        //         if( $value->time < now() && $value->id == 11 ){
        //             $data['pasts'][] = Collection::make($value);
        //             dd($value->count('time'));
        //         }
        //         else{
        //         }
        // };

        return view('teacher.pages.schedule_teach.schedule_teach',$data);
    }

    public function detailSchedule($id)
    {
        $data = array(); 
        if(Classes::find($id)->finish_date > now() ){
            $data['schedules'] = Schedule::where("class_id", $id)->paginate(10);
        } 
        $data['class'] = Classes::find($id);
        $data['pasts'] = Schedule::where('time','<', now())->where("class_id", $id)->get();

        return view('teacher.pages.schedule_teach.detail_schedule_teach',$data);
    }

    public function classList($id)
    {
        $data['class'] = Classes::find($id);
        $data['students'] = Student::where('class_id', $id)->get();
        $data['pasts'] = Schedule::where('time','<', now())->where('class_id',$id)->get();
        $sche = null;
        $i = 1;
        foreach(Schedule::where('class_id',$id)->get() as $value){
            
            if($value->student_id != null){
                $sche .= $value->student_id.',';
            }
           
        }
        $schedule = rtrim($sche,',');
        $data['schedule'] = explode(',',$schedule);

        return view('teacher.pages.schedule_teach.class_list',$data);
    }

}
