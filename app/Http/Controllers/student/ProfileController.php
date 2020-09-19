<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Student;
class ProfileController extends Controller
{
    public function index()
    {   
        $class_id = Auth::guard('student')->user()->class_id;
        $data['profile'] = Student::find(Auth::guard('student')->user()->id);
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
                 
        
        if(count($data['sessions']) <= 2/3 * count($data['number_of_sessions'])){
            return view('student.pages.profile.profile',$data);
        
        }
        else if(count($data['feedback']) > 0){
            return redirect()->route('student.pages.profile.profile',$data); 
        }
        else{
            return redirect('student/feedback');
        }
    }
       
}
