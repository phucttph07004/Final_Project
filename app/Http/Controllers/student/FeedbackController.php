<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Notification,Schedule,Student,Classes};
use Auth;
use DB;
use Carbon\Carbon;

class FeedbackController extends Controller
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
            return redirect()->route('home.student',$data); 
        }
        else{
            return view('student.pages.feedback.feedback');
        }
        
    }  
    public function store(FeedbackRequest $request)
    {
        $data = Arr::except($request->all(),['_token']);
        Feedback::create($data);
        return redirect()->route('home.student');
        
    }  
   
}