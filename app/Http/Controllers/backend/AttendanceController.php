<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Arr;
use Auth;
use DB;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Course;
use App\Models\Level;
use Carbon\Carbon;

class AttendanceController extends Controller
{

    public function index(Request $request){
        $data['courses']=Course::all();
                if ($request->all() != null && $request['page'] == null) {
                    foreach ($request->all() as $key => $value) {
                        if ($key == 'course_id') {
                            $data['course_name'] = Course::where('id',$value)->first();
                        
                            $data['classes']= DB::table('classes')
                                ->join('levels', 'classes.level_id', '=', 'levels.id')
                                ->join('courses', 'classes.course_id', '=', 'courses.id')
                                ->where('course_id', $value)
                                ->select('classes.name','levels.fee','classes.id')
                                ->get();
                             $class_id = array();
                                foreach($data['classes'] as $key1 => $value1){
                                       $class_id[] = $value1->id;
                                }
                            $studentByClass=array();
                            foreach($class_id as $key2 => $value2){
                                $studentByClass[$value2] = count( Student::where([['class_id',$value2],['fee_status',1]])->get());
                            }
                            $course_total=0;
                            foreach($data['classes'] as $key1 => $value1){
                                foreach($studentByClass as $key3 => $value3){
                                    if($value1->id == $key3){
                                       $data['total'][] = $value3 *  $value1->fee;
                                       $course_total += $value3 *  $value1->fee;
                                    }
                                }
                            }
                            
                    }
                    
                }
                
                        
                    
                } 
                else {
                    
                    $data['course_name'] = Course::orderBy('id','desc')->first();
                    $data['classes']= DB::table('classes')
                            ->join('levels', 'classes.level_id', '=', 'levels.id')
                            ->join('courses', 'classes.course_id', '=', 'courses.id')
                            ->where('course_id', $data['course_name']->id)
                            ->select('classes.name','levels.fee','classes.id')
                            ->get();
                            $class_id = array();
                            foreach($data['classes'] as $key => $value){
                                $class_id[] = $value->id;
                            }
                            $studentByClass=array();
                            foreach($class_id as $key1 => $value1){
                                $studentByClass[$value1] = count( Student::where([['class_id',$value1],['fee_status',1]])->get());
                            }
                            $course_total=0;
                            foreach($data['classes'] as $key => $value){
                                foreach($studentByClass as $key2 => $value2){
                                    if($value->id == $key2){
                                        $data['total'][] = $value2 *  $value->fee;
                                        $course_total += $value2 *  $value->fee;
                                    }
                                }
                            }
                            // dd($course_total);
                            $check_course = DB::table('revenues')
                            ->where('course_id', $data['course_name']->id)->first();
                            // dd($check_course);
                        if($check_course = null){
                            DB::table('revenues')->insert(
                                ['course_id' => $data['course_name']->id, 'total' => $course_total]
                            );
                        }        
                            
                }
                
                
                
        return view('backend.pages.attendance.index',$data);
        // $currentDate = date('Y-m-d');
        // $weekday = date('N');
        // $hour = date('H');
        // $minute = date('i');
        // $currentTime = $hour + $minute/60;
        // $weekday = date('N');
        // if($currentTime >= 7.25 && $currentTime <= 9.25){
        //     $slot = 1;
        // }
        // else if($currentTime >= 9.75 && $currentTime <= 11.25){
        //     $slot = 2;
        // }
        // else if($currentTime >= 13.50 && $currentTime <= 15.50){
        //     $slot = 3;
        // }
        // else if($currentTime >= 15.75 && $currentTime <= 17.75){
        //     $slot = 4;
        // }
        // else if($currentTime >= 18.00 && $currentTime <= 20.00){
        //     $slot = 5;
        // }
        // else if($currentTime >= 20.25 && $currentTime <= 22.25){
        //     $slot = 6;
        // }
        // else{
        //     $slot = -1;
        // }
    
        
        // $today = DB::table('schedules')
        //     ->join('users', 'schedules.teacher_id', '=', 'users.id')
        //     ->join('classes', 'schedules.class_id', '=', 'classes.id')
		// 	->where('start_date', '<=', $currentDate)
        //     ->where('finish_date', '>=', $currentDate)
        //     ->where('weekday',  $weekday)
        //     ->where('slot',  $slot)
        //     ->select('schedules.id', 'classes.name', 'users.fullname')
		// 	->get();
        //     return view('backend.pages.attendance.index')->with([
		// 		'today' => $today
		// 	]);
    }
   
    public function post(Request $request) {

		$schedule_id  = $request->schedule_id;
		$data = json_decode($request->data, true);
		$currentTime = date('Y-m-d H:i:s');
		$currentDate = date('Y-m-d');

		//Them moi.
		foreach ($data as $item) {
			DB::table('attendance')->insert([
					'student_id'     => $item['student_id'],
					'status'     => $item['status'],
					'created_at' => $currentTime,
					'updated_at' => $currentTime
				]);
		}
		return redirect()->route('attendence.index');
	}   

}
    

