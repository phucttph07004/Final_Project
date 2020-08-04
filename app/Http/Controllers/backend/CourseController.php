<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\course\CourseRequest;


use App\Models\Course;

use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(10);

        return view('backend.pages.course.course',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
      
        return view('backend.pages.course.create-course');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $data = Arr::except($request->all(),['_tokent']);
        $data['user_id']=Auth::user()->id;

        $start_date = new Carbon($request->input('start_date'));
        $finish_date = new Carbon($request->input('finish_date'));
        $diff_days = $start_date->diff($finish_date);

        Course::create($data);

        return redirect()->route('course.index')->with('thongbao','Tạo khoá học thành công');
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
        $data['course']=Course::find($id);
        return view('backend.pages.course.edit-course',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $courses = Course::find($id);

        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $update_at = Carbon::now()->toarray();
        $data['update_at'] = $update_at['formatted'];

        $courses->update($data);

        return redirect()->route('course.index')->with('thongbao','Cập nhật khoá học thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect()->back();
    }
}