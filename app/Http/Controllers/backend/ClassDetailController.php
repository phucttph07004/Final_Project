<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\{Branch, Student,Classroom,Level};
use Illuminate\Http\Request;


use App\Models\{Classes,Course,Level,User,Student};

use Arr;
use Auth;
use Carbon\Carbon;

class ClassDetailController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['get_all_level']=Level::all();
        return view('frontend.register',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data = Arr::except($request->all(), ['_token']);
        $data['status']=0;
        $register = Register::create($data);
        return redirect()->back()->with('thongbao','Bạn đã đăng ký thành công');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**;
     * Update the; specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $students = Student::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $students->update($data);

        return redirect()->route('class.index')->with('thongbao','Cập nhật lớp học thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
