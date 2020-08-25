<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\{Classes, Level, Schedule, User, Course};
use Illuminate\Http\Request;
use Arr;
use Str;
use Auth;
use Carbon\Carbon;


class schedule_teachController extends Controller
{
    public function index(Request $Request)
    {

        $data['get_schedule'] = Schedule::all();
        $data['get_all_user'] = User::all();
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

        // lấy ra các lớp trong  bảng khóa vẫn còn chạy
        if ($data['get_schedule'] != null) {
            $class = array();
            foreach ($data['get_schedule'] as $value) {
                if (array_search($value->class_id, $class) === false && array_search(Classes::find($value->class_id)->course_id, $get_all_course) !== false) {
                    $class[] = $value->class_id;
                }
            }
        }

        // finter
        if ($Request->all() != null && $Request['page'] == null) {
            foreach ($Request->all() as $key => $value) {
                if ($key == 'name') {
                    $collection = array();
                    if ($data['get_schedule'] != null) {
                        foreach (Classes::where([[$key, 'LIKE', "%$value%"], ['status', '!=', 0]])->withcount('CountStuden')->get() as $value) {
                            if (array_search($value->id, $class) !== false) {
                                $collection[] = $value;
                            }
                        }
                        $check = count($collection) != 0 ? $collection : array();
                        $data['get_all_class'] = collect($check);
                    }
                } else if ($key == 'teacher' && $value == 1) {
                    $collection = array();
                    if ($data['get_schedule'] != null) {
                        foreach (Classes::all() as $value) {
                            if (array_search($value->id, $class) !== false && $value->teacher_id != null) {
                                $collection[] = Classes::where([['id', $value->id], ['teacher_id', '!=', null]])->withcount('CountStuden')->first();
                            }
                        }
                        $check = count($collection) != 0 ? $collection : array();
                        $data['get_all_class'] = collect($check);
                    }
                } else {
                    $collection = array();
                    if ($data['get_schedule'] != null) {
                        foreach (Classes::all() as $value) {
                            if (array_search($value->id, $class) !== false && $value->teacher_id == null) {
                                $collection[] = Classes::where([['id', $value->id], ['teacher_id', '=', null]])->withcount('CountStuden')->first();
                            }
                        }
                        $check = count($collection) != 0 ? $collection : array();
                        $data['get_all_class'] = collect($check);
                    }
                }
            }
        } else {
            // lấy ra all các lớp trong  bảng
            if ($data['get_schedule'] != null) {
                $collection = array();
                foreach (Classes::all() as $value) {
                    if (array_search($value->id, $class) !== false) {
                        $collection[] = Classes::where('id', $value->id)->withcount('CountStuden')->first();
                    }
                }
                $data['get_all_class'] = collect($collection);
            }
        }
        return view('backend.pages.schedule_teach.index', $data);
    }



    public function store(Request $request)
    {
        $data = Arr::except($request, ['_token'])->toarray();
        $Schedule = Schedule::where('class_id', $data['class_id'])->get();
        Classes::find($data['class_id'])->update($data);
        foreach ($Schedule as $value) {
            $Schedule_update = Schedule::find($value->id)->update($data);
        }
        return redirect()->back()->with('thongbao', 'Xếp Giảng Viên Cho Lớp Thành Công');
    }
}
