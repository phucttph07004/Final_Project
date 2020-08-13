<?php

namespace App\Http\Controllers\backend;

use App\Models\{Course, Student, Classes, Level, history_learned_class};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\student\{StudentRequest, StudentRequestEdit};
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index(Request $request)
    {

        if ($request->all() != null && $request['page'] == null) {
            foreach ($request->all() as $key => $value) {
                if ($key == 'status') {
                    $data['get_all_course'] = Course::all();
                    $data['get_all_class'] = Classes::all();
                    $data['get_all_student'] = Student::where("$key", "$value")->paginate(10);
                } else {
                    $data['get_all_course'] = Course::all();
                    $data['get_all_class'] = Classes::all();
                    $data['get_all_student'] = Student::where("$key", 'LIKE', "%$value%")->paginate(10);
                }
            }
        } else {
            $data['get_all_course'] = Course::all();
            $data['get_all_class'] = Classes::all();
            $data['get_all_student'] = Student::paginate(10);
        }
        return view('backend.pages.student.index', $data);
    }

    public function destroy(Request $request ,$id){
        dd($request->all());
        // Student::destroy($id);
        // return redirect()->back()->with('thongbao','Xóa Thành Công');
    }

    public function create()
    {
        $data['get_all_course'] = null;
        foreach (Course::all() as $value) {
            $first_date = strtotime($value->start_date);
            $second_date = strtotime($value->finish_date);
            $datediff = abs($first_date - $second_date);
            $time_allowed = floor($datediff / (60 * 60 * 24) / 10);
            $start_date = strtotime(date("Y-m-d", strtotime($value->start_date)) . " +$time_allowed days");
            $start_date_plus10 = strftime("%Y-%m-%d", $start_date);

            if ($start_date_plus10 >= date('Y-m-d')) {
                $data['get_all_course'][] = $value;
            }
        }
        $data['get_all_level'] = Level::all();
        $data['get_all_class'] = Classes::all();
        return view('backend.pages.student.create', $data);
    }

    public function store(StudentRequest $request)
    {
        $data = Arr::except($request, ['_token'])->toarray();
<<<<<<< HEAD
        $data['is_active']=1;
        $code=Student::orderBy('id', 'desc')->get()->first()->id;
        $data['code']="PH$code";
        $data['password']=bcrypt('123456');
        $data['avatar']=$request->file('avatar')->store('images','public');
=======
        $data['is_active'] = 1;
        if(Student::all()->last() == null){
            $data['code'] = "PH001";
        }else{
        $code = Student::all()->last()->id;
        $data['code'] = "PH00$code";
        }
        $data['password'] = bcrypt('123456');
        $data['avatar'] = $request->file('avatar')->store('images', 'public');
>>>>>>> e8e75107bbba5fb44d3af803dbe24a4550fcc1bc
        Student::create($data);
        return redirect()->back()->with('thongbao', 'Thêm Học Viên Thành Công');
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

        $data['get_all_course'] = null;
        foreach (Course::all() as $value) {
            $first_date = strtotime($value->start_date);
            $second_date = strtotime($value->finish_date);
            $datediff = abs($first_date - $second_date);
            $time_allowed = floor($datediff / (60 * 60 * 24) / 10);
            $start_date = strtotime(date("Y-m-d", strtotime($value->start_date)) . " +$time_allowed days");
            $start_date_plus10 = strftime("%Y-%m-%d", $start_date);

            if ($start_date_plus10 >= date('Y-m-d')) {
                $data['get_all_course'][] = $value;
            }
        }
        $data['get_all_level'] = Level::all();
        $data['get_all_class'] = Classes::all();
        $data['get_student'] = $student;
        return view('backend.pages.student.edit', $data);
    }

    public function update(StudentRequestEdit $request ,$id){
        $data = Arr::except($request, ['_token','_method'])->toarray();
        $student=Student::find($id);
        if($data['avatar'] != $student->avatar){
            $data['avatar']=$request->file('avatar')->store('images','public');
            }
        $student->update($data);
        return redirect()->back()->with('thongbao','Cập Nhật Học Viên Thành Công');
    }
}
