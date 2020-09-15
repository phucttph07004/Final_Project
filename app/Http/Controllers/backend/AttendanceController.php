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

    public function index(){
        $data['course'] = Course::orderBy('id','desc')->first();
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
    public function show($id){
        // $data['students'] = DB::table('students')
        //     ->join('classes', 'students.class_id', '=', 'classes.id')
        //     ->join('courses', 'classes.course_id', '=', 'courses.id')
        //     ->where('classes.course_id',  $id)
        //     ->get();
        // $data['level'] = DB::table('levels')
        //     ->join('classes', 'levels.id', '=', 'classes.level_id')
        //     ->join('courses', 'classes.course_id', '=', 'courses.id')
        //     ->where('classes.course_id',  $id)
        //     ->get();
            $data['levels']= DB::table('level')
                ->join('courses', 'classes.course_id', '=', 'courses.id')
                ->join('levels', 'classes.level_id', '=', 'levels.id')
                ->where('course_id', $id)
                ->select('classes.name','levels.fee', 'students.id')
                ->get();
                $class_id = array();
                    foreach (Classes::where('course_id', $value)->get() as $class) {
                        $class_id[] = $class->id;
                    }
                    $student = array();
                    foreach ($id_class as $id_class) {
                        $student[] = Student::where('class_id', $id_class)->get()->toarray();
                    }
                    $aa = array();
                    foreach (Collect($student) as $key => $value1) {
                        foreach ($value1 as $value) {
                            $aa[] = $value;
                        }
                    }
                    $data['get_all_student'] = $aa;
            return view('backend.pages.attendance.edit_attendance',$data);
    //     $schedule = DB::table('schedules')
    //         ->where('id', $id)
    //         ->get();
        
    //     $studentList = DB::table('students')
    //     ->where('class_id', $schedule->class_id)
    //     ->get();
       
    //     echo($schedule);die;
    //    return view('backend.pages.attendance.edit_attendance')->with([

    //         'schedule'     => $schedule,
    //         'studentList' => $studentList,

    //     ]);
        
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
    

