<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\{Branch, Student,Classroom,Level};
use Illuminate\Http\Request;
use App\Http\Requests\frontend\register\RegisterRequest;

use App\Models\Enrollment;
use App\Models\Setting;

use Mail;
use Arr;
class EnrollmentController extends Controller
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
        return view('frontend.enrollment',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
       
        $data = Arr::except($request->all(), ['_token']);
        $data['status']=0;
        $enrollment = Enrollment::create($data);
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
        //
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
