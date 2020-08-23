<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Excel;
use App\Models\{Student, Schedule, Classes, Course, User};
use Arr;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class ExcelController extends Controller
{
    public function student_create_excel()
    {
        return view('backend.pages.student.create_excel');
    }

    //    public function student_store_excel()
    //     {
    //         $import = Excel::import(new StudentsImport, request()->file('excel'));
    //         return redirect()->back()->with('thongbao', 'Thêm Học Viên Thành Công');
    //     }

    public function show_class_add($slot, $level)
    {
        $get_all_course = array();
        foreach (Course::all() as $value) {
            $first_date = strtotime($value->start_date);
            $second_date = strtotime($value->finish_date);
            $datediff = abs($first_date - $second_date);
            $time_allowed = floor($datediff / (60 * 60 * 24) / 10);
            $start_date = strtotime(date("Y-m-d", strtotime($value->start_date)) . " +$time_allowed days");
            $start_date_plus10 = strftime("%Y-%m-%d", $start_date);

            if ($start_date_plus10 >= date('Y-m-d')) {
                $get_all_course[] = $value;
            }
        }

        if (count($get_all_course) != 0) {
            $get_class = Schedule::where([['slot', $slot], ['level_id', $level]])->get();
            if (count($get_class) == 0) {
                return $get_class;
            } else {
                foreach ($get_class as $class_id) {
                    $class[] = $class_id->class_id;
                }
                $class_id = 0;
                for ($i = 0; $i < count($class); $i++) {
                    if ($class_id != $class[$i]) {
                        $class_id = $class[$i];
                        $get_all_class[] = Classes::find($class[$i]);
                    }
                }
                return $get_all_class;
            }
        } else {
            return -1;
        }
    }

    public function show_edit_schedule($id)
    {
        $week_slot = array();
        foreach (Schedule::where('class_id', $id)->get() as $value) {
            if (array_search($value->weekday, $week_slot) === false) {
                $week_slot[$value->weekday] = $value->slot;
            }
        }
        return $week_slot;
    }

    public function show_teacher_schedule_teach($id)
    {
        $teacher_selected[]=User::find(Classes::find($id)->teacher_id);
        // đển in ra fonrend
        $week_and_slot = array();
        // tạo 1 mngr rỗng để check
        $finter_week_slot = array();
        // lấy ra thứ và ca của lớp vừa click
        foreach (Schedule::where('class_id', $id)->get() as $value) {
            if (array_search($value->weekday, $finter_week_slot) === false) {
                // đển in ra fonrend
                $week_and_slot[$value->weekday] = $value->slot;
            }
        }
        // lấy ra toàn bộ giáo viên chưa có lịch dậy và check giáo viên có lịch dạy có trùng hay k
        $all_teacher = array();
        foreach (User::where([['role', 4], ['status', 1]])->get() as $value) {
            foreach ($week_and_slot as $key => $week_slot) {
                $check = DB::select("SELECT * FROM `schedules`
            INNER JOIN classes ON schedules.class_id = classes.id
            where schedules.teacher_id = $value->id
            and classes.finish_date > CURDATE()
            and  weekday = $key AND slot = $week_slot
            ");
            }
            if (count($check) == 0) {
                $all_teacher[] = $value;
            }
        }
        return [$all_teacher, $week_and_slot,$teacher_selected];
    }
}
