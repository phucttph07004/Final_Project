<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Classes,Level,Schedule};
use Arr;
use Auth;
use Carbon\Carbon;

class schedule_learnController extends Controller
{
    public function index(Request $Request){
        $data['get_all_level']=Level::all();
        if ($Request->all() != null && $Request['page'] == null) {
            foreach ($Request->all() as $key => $value) {
                if($key != 'status'){
                if($key == 'name'){
                    $data['get_all_class']=Classes::where("$key", 'LIKE', "%$value%")->withcount('CountClass')->paginate(10);
                }elseif ($key == 'weekday' && $value == 0) {
                   $data['get_all_class']=Classes::where([['weekday',null],['slot',null]])->withcount('CountClass')->paginate(10);
                }else {
                    $data['get_all_class']=Classes::where('weekday',"!=",null)->withcount('CountClass')->paginate(10);
                }
            }else{
                $data['get_all_class']=Classes::where('status',0)->withcount('CountClass')->paginate(10);
            }
            }
        } else {
            $data['get_all_class']=Classes::withcount('CountClass')->paginate(10);
        }
        return view('backend.pages.schedule_learn.index',$data);
    }


    public function store(Request $request){

        $data = Arr::except($request, ['_token','_method'])->toarray();
        $datacreate['weekday']="";
        $datacreate['slot']="";

        $array1= array();
        $array2= array();
        foreach( $data as $key => $value){
            if($value != 0 && $key != 'class_id' && $key != 'level_id'){
                $array1[] = $key;
                $array2[] = $value;
            }
        }
        $datacreate['user_id'] = Auth::user()->id;
        $datacreate['class_id']=$data['class_id'];
        $datacreate['level_id']=$data['level_id'];
        $datacreate['time']=now();

        $class=Classes::where('id',$data['class_id'])->first();

        dd($class);
        //Lay o dau? ok! tim cach lay ngay bat dau nhe. t de tam thoi o day la now() nhe
        $date = Carbon::now();
        for($i=0 ;$i < $class->number_of_sessions ;$i++){
            $schedule=array(
                'weekday' => $array1,
                'slot'=> $array2,
                'student_id' =>Auth::user()->id,
                'user_id' =>Auth::user()->id,
                'level_id' =>$data['level_id'],
                // 'time' => now(), lấy thời gian của ca học
            );

            if ($i % 2 == 1) {
                $dayInWeek = $array1[0];
            } else {
                $dayInWeek = $array1[1];
            }

            switch ($dayInWeek) {
                case 2:
                    $date = $date->next('Monday');
                    break;

                case 3:
                    $date = $date->next('Tuesday');
                    break;

                case 4:
                    $date = $date->next('Wed ...');
                    break;

                case 5:
                    $date = $date->next('Thursday');
                    break;

                case 6:
                    $date = $date->next('Monday');
                    break;

                case 7:
                    $date = $date->next('Monday');
                    break;

            }

            $schedule['time'] = $date;

            // Chỗ phía trên tự đổi nốt nhé!  tạo thêm có ca cũng giống như ngày
            // Schedule::create($schedule);
        }


        dd($class);
        Schedule::create($datacreate);
        return redirect()->back();
    }


}
