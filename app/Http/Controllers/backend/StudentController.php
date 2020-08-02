<?php

namespace App\Http\Controllers\backend;
use App\Models\{Branch, Student,Classroom,Level};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\student\{StudentRequest,StudentRequestEdit};
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index(Request $request){

        if($request->all() != null && $request['page'] == null){
            foreach($request->all() as $key => $value){
                if($key == 'is_active'){
                    $data['get_all_class']=Classroom::all();
                    $data['get_all_branch']=Branch::all();
                    $data['get_all_student']=Student::where("$key","$value")->paginate(10);
                }else{
                    $data['get_all_class']=Classroom::all();
                    $data['get_all_branch']=Branch::all();
                    $data['get_all_student']=Student::where("$key",'LIKE',"%$value%")->paginate(10);
                }
            }
        }else{
            $data['get_all_class']=Classroom::all();
            $data['get_all_branch']=Branch::all();
            $data['get_all_student']=Student::paginate(10);
        }
        return view('backend.pages.student.index',$data);
    }

    // public function destroy($id){
    //     Student::destroy($id);
    //     return redirect()->back()->with('thongbao','Xóa Thành Công');
    // }

    public function create(){
        $data['get_all_level']=Level::all();
        $data['get_all_class']=Classroom::all();
        $data['get_all_branch']=Branch::all();
        return view('backend.pages.student.create',$data);
    }

    public function store(StudentRequest $request){
        $data = Arr::except($request, ['_token'])->toarray();
        $data['is_active']=1;
        $code=Student::orderBy('id', 'desc')->get()->first()->id;
        $data['code']="PH$code";
        $data['password']=bcrypt('123456');
        $data['avatar']=$request->file('avatar')->store('images','public');
        Student::create($data);
        return redirect()->back()->with('thongbao','Thêm Học Viên Thành Công');
    }

    public function show(Student $student){
        $data['get_all_level']=Level::all();
        $data['get_all_class']=Classroom::all();
        $data['get_all_branch']=Branch::all();
        $data['get_student']=$student;
        return view('backend.pages.student.detail',$data);
    }

    public function edit(Student $student){
        $data['get_all_level']=Level::all();
        $data['get_all_class']=Classroom::all();
        $data['get_all_branch']=Branch::all();
        $data['get_student']=$student;
        return view('backend.pages.student.edit',$data);
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
