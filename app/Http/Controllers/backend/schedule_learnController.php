<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Classes, Level, Schedule, Course};
use Arr;
use Auth;
use Carbon\Carbon;

class schedule_learnController extends Controller
{
    public function index(Request $Request)
    {
        $data['get_all_level'] = Level::all();
        $data['get_all_schedule'] = Schedule::all();
        // lấy ra khóa hiện tại đg hoạt động
        $get_all_course = array();
        foreach (Course::all() as $value) {
            $first_date = strtotime($value->start_date);
            $second_date = strtotime($value->finish_date);
            $datediff = abs($first_date - $second_date);
            $time_allowed = floor($datediff / (60 * 60 * 24) / 10);
            $start_date = strtotime(date("Y-m-d", strtotime($value->start_date)) . " +$time_allowed days");
            $start_date_plus10 = strftime("%Y-%m-%d", $start_date);
            if ($start_date_plus10 >= date('Y-m-d')) {
                $get_all_course[] = $value->id;
            }
        }
        $data['check_course'] = $get_all_course;
        // lấy ra các lớp có lịch  để check lớp đã có lịch hay chưa
        $data['get_schedule'] = Schedule::all();
        if ($data['get_schedule'] != null) {
            $class = array();
            foreach ($data['get_schedule'] as $value) {
                if (array_search($value->class_id, $class) === false) {
                    $class[] = $value->class_id;
                }
            }
            $data['get_schedule'] = $class;
        }
        // finter
        $data['check'] = false;
        $collection = array();
        if ($Request->all() != null && $Request['page'] == null) {
            foreach ($Request->all() as $key => $value) {
                    if ($key == 'name') {
                        $data['get_all_class'] = Classes::where([["$key", 'LIKE', "%$value%"],['status','!=',0]])->withcount('CountStuden')->paginate(10);
                    } elseif ($key == 'weekday' && $value == 0) {
                        foreach (Classes::all() as $value) {
                            if (array_search($value->id, $class) === false && array_search($value->course_id, $get_all_course) !== false) {
                                $collection[] = Classes::where([['id', $value->id],['status','!=',0]])->withcount('CountStuden')->first();
                            }
                        }
                        $data['check'] = true;
                        $data['get_all_class'] = collect($collection);
                    } else {
                        foreach (Classes::all() as $value) {
                            if (array_search($value->id, $class) !== false && array_search($value->course_id, $get_all_course) !== false) {
                                $collection[] = Classes::where([['id', $value->id],['status','!=',0]])->withcount('CountStuden')->first();
                            }
                        }
                        $data['check'] = true;
                        $check=collect($collection)[0]!=null?collect($collection):array();
                        $data['get_all_class'] = $check;
                    }
            }
        } else {
                $data['get_all_class'] = Classes::where('status','!=',0)->withcount('CountStuden')->paginate(10);
        }
        return view('backend.pages.schedule_learn.index', $data);
    }


    public function store(Request $request)
    {
        if (count(Schedule::where('class_id', $request['class_id'])->get()) != 0) {

            foreach (Schedule::where('class_id', $request['class_id'])->get() as $value) {
                Schedule::destroy($value->id);
            }
        }
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        $datacreate['weekday'] = "";
        $datacreate['slot'] = "";
        $weekday = array();
        $slot = array();
        foreach ($data as $key => $value) {
            if ($value != 0 && $key != 'class_id' && $key != 'level_id') {
                $weekday[] = $key;
                $slot[] = (int)$value;
            }
        }
        $class = Classes::where('id', $data['class_id'])->first();
        $date = new Carbon($class->start_date);

        $i = 0;
        while (true) {
            $schedule = array(
                'student_id' => null,
                'user_id' => Auth::user()->id,
                'level_id' => $data['level_id'],
                'class_id' => $class->id,
                'teacher_id' => null,
            );
            foreach ($weekday as $key => $value) {
                $dayInWeek = $value;
                $schedule['weekday'] = $value;
                $schedule['slot'] = $slot[$key];

                switch ($dayInWeek) {
                    case 2:
                        $date = $date->next('Monday');
                        break;

                    case 3:
                        $date = $date->next('Tuesday');
                        break;

                    case 4:
                        $date = $date->next('Wednesday');
                        break;

                    case 5:
                        $date = $date->next('Thursday');
                        break;

                    case 6:
                        $date = $date->next('Friday');
                        break;

                    case 7:
                        $date = $date->next('Saturday');
                        break;
                }
                $schedule['time'] = $date;
                Schedule::create($schedule);
                $i++;
                if ($i >= $class->number_of_sessions) break;
            }
            if ($i >= $class->number_of_sessions) break;
        }
        return redirect()->back();
    }
}
