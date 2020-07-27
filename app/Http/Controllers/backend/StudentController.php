<?php

namespace App\Http\Controllers\backend;
use App\Models\{Student,Classroom,Level};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\student\StudentRequest;
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index(){
        $data['get_all_student']=Student::paginate(10);
        return view('backend.pages.student.index',$data);
    }
    public function destroy($id){
        Student::destroy($id);
        return redirect()->back()->with('thongbao','Xóa Thành Công');
    }

    public function create(){
        $data['get_all_level']=Level::all();
        $data['get_all_class']=Classroom::all();
        return view('backend.pages.student.create',$data);
    }

    public function store(Request $request){
        $data = Arr::except($request, ['_token'])->toarray();
        $data['is_active']=1;
        $code=Student::orderBy('id', 'desc')->get()->first()->id;
        $data['code']="PH$code";
        $data['avatar']=$request->file('avatar')->store('images','public');
        Student::create($data);
        return redirect()->back()->with('thongbao','Thêm Học Sinh Thành Công');
    }
}
