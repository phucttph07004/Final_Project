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

        // finter
        if ($Request->all() != null && $Request['page'] == null) {
            foreach ($Request->all() as $key => $value) {
                if ($key == 'name') {
                    $collection = array();
                    foreach (Classes::where([[$key, 'LIKE', "%$value%"], ['status', '!=', 0], ['finish_date', '>', now()]])->withcount('CountStuden')->get() as $value) {
                        $collection[] = $value;
                    }
                    $check = count($collection) != 0 ? $collection : array();
                    $data['get_all_class'] = collect($check);
                } else if ($key == 'teacher' && $value == 1) {
                    $collection = array();
                    foreach (Classes::where([['teacher_id', '!=', null], ['finish_date', '>', now()]])->withcount('CountStuden')->get() as $value) {
                        $collection[] = $value;
                    }
                    $check = count($collection) != 0 ? $collection : array();
                    $data['get_all_class'] = collect($check);
                } else {
                    $collection = array();
                    foreach (Classes::where([['teacher_id', null], ['finish_date', '>', now()]])->withcount('CountStuden')->get() as $value) {
                        $collection[] = $value;
                    }
                    $check = count($collection) != 0 ? $collection : array();
                    $data['get_all_class'] = collect($check);
                }
            }
        } else {
            // lấy ra all các lớp trong  bảng
            $collection = array();
            foreach (Classes::where('finish_date', '>', now())->get() as $value) {
                $collection[] = Classes::where('id', $value->id)->withcount('CountStuden')->first();
            }
            $data['get_all_class'] = collect($collection);
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
