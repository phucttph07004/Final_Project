<?php

namespace App\Http\Controllers\backend;

use App\Models\{Course, Student, Classes, Level, history_learned_class, Waiting_list,Revenue};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\student\{StudentRequest, StudentRequestEdit};
use Arr;
use Str;
use DB;
use Auth;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $data['get_all_course'] = Course::all();
        $data['get_all_class'] = Classes::all();
        $data['check'] = false;
        if ($request->all() != null && $request['page'] == null) {
            foreach ($request->all() as $key => $value) {
                if ($key == 'status') {
                    $data['get_all_student'] = Student::where("$key", "$value")->paginate(10);
                } elseif ($key == 'fee_status') {
                    $data['get_all_student'] = Student::where("$key", "$value")->paginate(10);
                } else if ($key == 'course') {
                    $id_class = array();
                    foreach (Classes::where('course_id', $value)->get() as $class) {
                        $id_class[] = $class->id;
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
                    $data['check'] = true;
                } else {
                    $data['get_all_student'] = Student::where("$key", 'LIKE', "%$value%")->paginate(10);
                }
            }
        } else {
            $data['get_all_student'] = Student::paginate(10);
        }
        return view('backend.pages.student.index', $data);
    }

    public function destroy(Request $request, $id)
    {
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        $student = Student::find($id);
        if ($request['fee_status'] == 1) {
            $data['fee_status'] = 0;
        } else {
            $data['fee_status'] = 1;
        }
        if ($request['status'] == 1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        $student->update($data);
        $class = Classes::find($student->class_id);
        $classes = Classes::where('course_id', $class->course_id)->get();
        foreach ($classes as $key => $value) {
            $level[] = $value->level_id;
        }
        $level_id=array_unique($level);
        // dd($level_id);
        foreach ($level_id as $key1 => $value1) {
            $fee = level::where('id', $value1)->get();
            foreach ($fee as $key2 => $value2) {
                if($value1 == $value2->id){
                    $level_fee[$value1] = $value2->fee; 
                }
            }
        }
        $lv_fee = json_encode($level_fee);
        
        $course_id = $class->course_id;
        $level = Level::find($class->level_id);
        $lv = array($level->id => $level->fee);
        $level_fee = json_encode($lv);
        
        
        $check = Revenue::where("course_id",$course_id)->first();
        if($check == null){
            DB::table('revenues')->insert(
                ['course_id' => $course_id, 'level_fee' => $lv_fee, 'total' => '0']
            );
            $check1 = Revenue::where("course_id",$course_id)->first();
            $feeByLv = json_decode($check1->level_fee);
            foreach ($feeByLv as $key => $value) {
                $level_name[] = Level::where('id',$key)->get();
            }
            foreach ($feeByLv as $key => $value) {
            if($class->level_id == $key){
                DB::table('revenues')
                    ->where('course_id', $course_id)
                    ->update(['total' => $check1->total + $value]);
            }
        }
    }
        else{
            $feeByLv = json_decode($check->level_fee);
        //    dd( $feeByLv);
            
            foreach ($feeByLv as $key => $value) {
            if($class->level_id == $key){
                $abc = DB::table('revenues')
                    ->where('course_id', $course_id)
                    ->update(['total' => $check->total + $value, 'level_fee' => $lv_fee]);
            }
        }
        
    }
   
        ;

        return redirect()->back();
    }

    public function create()
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

        $data['get_all_course'] = $get_all_course;
        $data['get_all_level'] = Level::all();
        $data['get_all_class'] = Classes::all();
        return view('backend.pages.student.create', $data);
    }

    public function store(StudentRequest $request)
    {
        $data = Arr::except($request, ['_token'])->toarray();
        if ($data['class_id'] == null) {
            $data['status'] = 1;
            $data['slot'] = $data['slot_add'];
            Waiting_list::create($data);
            return redirect()->back()->with('thongbao', 'Thêm Học Viên Vào Danh Sách Chờ Thành Công');
        } else {
            if (Student::all()->last() == null) {
                $data['code'] = "PH001";
            } else {
                $code = Student::all()->last()->id;
                $data['code'] = "PH00$code";
                $data['fee_status'] = 0;
            }
            $data['status'] = 1;
            $data['fee_status'] = 0;
            $data['password'] = bcrypt('123456');
            $data['avatar'] = $request->file('avatar')->store('images', 'public');
            Student::create($data);
            return redirect()->back()->with('thongbao', 'Thêm Học Viên Thành Công');
        }
    }

    public function show(Student $student)
    {
        $data['get_all_level'] = Level::all();
        $data['get_all_course'] = Course::all();
        $data['get_all_class'] = Classes::all();
        $data['get_all_history'] = history_learned_class::all();
        $data['get_student'] = $student;
        return view('backend.pages.student.detail', $data);
    }

    public function edit(Student $student)
    {
        $data['get_all_course'] = Course::all();
        $data['get_all_level'] = Level::all();
        $data['get_student'] = $student;
        return view('backend.pages.student.edit', $data);
    }

    public function update(StudentRequestEdit $request, $id)
    {
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        $student = Student::find($id);
        if ($data['avatar'] != $student->avatar) {
            $data['avatar'] = $request->file('avatar')->store('images', 'public');
        }
        $student->update($data);
        return redirect()->back()->with('thongbao', 'Cập Nhật Học Viên Thành Công');
    }
}