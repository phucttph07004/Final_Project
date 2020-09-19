<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Arr;
use Auth;
use DB;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Course;
use App\Models\Level;
use App\Models\Revenue;
use Carbon\Carbon;

class RevenueController extends Controller
{

    public function index(Request $request){
        $data['courses']=Course::all();
            if ($request->all() != null && $request['page'] == null) {
                foreach ($request->all() as $key => $value) {
                    if ($key == 'course_id') {
                        $data['course_name'] = Course::where('id',$value)->first();
                        
                        $data['get_all_classes'] = Classes::where('course_id', $data['course_name']->id)->get();
                        $check = Revenue::where("course_id",$value)->first();
                        
                        $level_id = json_decode($check->level_fee);
                        foreach ($level_id as $key1 => $value1) {
                            $level_name[] = Level::where('id',$key1)->get();
                            foreach ($level_name as $key2 => $value2) {
                                foreach ($value2 as $key3 => $value3) {
                                    $data['name'][$key1] = $value3;
                                }
                            }
                        }
                        $studentByClass=array();
                        foreach($level_id as $key1 => $value1){
                            $class_id[$key1] = DB::table('classes')
                                ->where('course_id', $value)
                                ->where('level_id', $key1)
                                ->get();
                                foreach ($class_id as $key4 => $value4) {
                                    foreach ($value4 as $key5 => $value5) {
                                        $studentByClass[$key1] = count( Student::where([['class_id',$value5->id],['fee_status',1]])->get());
                                    }
                                }
                            
                        }
                        $data['course_total']=0;
                        foreach($level_id as $key1 => $value1){
                            foreach($studentByClass as $key6 => $value6){
                                if($key1 == $key6){
                                    $data['total'][] = $value6 *  $value1;
                                    $data['course_total'] += $value6 *  $value1;
                                    
                                }
                            }
                        }
                        // dd($data['course_total']);      
                    }  
                }   
            } 
            else {
                $data['course_name'] = Course::orderBy('id','desc')->first();
                $data['get_all_classes'] = Classes::where('course_id', $data['course_name']->id)->get();
                $check = Revenue::where("course_id",$data['course_name']->id)->first();
                
                $level_id = json_decode($check->level_fee);
                
                foreach ($level_id as $key => $value) {
                    $level_name[] = Level::where('id',$key)->get();
                    foreach ($level_name as $key1 => $value1) {
                        foreach ($value1 as $key2 => $value2) {
                            $data['name'][$key] = $value2;
                        }
                    }
                }
               
                $studentByClass=array();
                foreach($level_id as $key => $value){
                    $class_id[$key] = DB::table('classes')
                        ->where('course_id', $data['course_name']->id)
                        ->where('level_id', $key)
                        ->get();
                        foreach ($class_id as $key1 => $value1) {
                            foreach ($value1 as $key2 => $value2) {
                                $studentByClass[$key] = count( Student::where([['class_id',$value2->id],['fee_status',1]])->get());
                            }
                        }
                    
                }
                foreach($level_id as $key => $value){
                    foreach($studentByClass as $key3 => $value3){
                        if($key == $key3){
                            $data['total'][] = $value3 *  $value;
                            
                        }
                    }
                }     
                // dd($data['total']);
                
            }
                return view('backend.pages.revenue.index',$data);                   
                 
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
    

