<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;

use App\Models\Register;
use App\Models\Test;

use Str;
use Auth;
use Mail;
use Carbon\Carbon;



class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registers = Register::orderBy('created_at','desc')->paginate(10);
        return view('backend.pages.register.register',['registers' => $registers]);
    }

    public function destroy($id)
    {
        $registers = Register::find($id);

     $data['is_active'] = 1;

        $registers->update($data);

        return redirect()->back();
    }

    public function confirm(Request $request)
    {
        $data = Arr::except($request->all(),['_token']);
        
        Test::create($data);

        return redirect()->route('register.index')->with('thongbao','Xác nhận thành công');
    }

    public function changeStatus(Request $request)
    {
        $register = Register::find($request->id);
        $register->is_active = $request->is_active;
        $register->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data['register'] = Register::find($id);
        return view('backend.pages.register.edit-register',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $register = Register::find($id);

        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $updated_at=Carbon::now()->toarray();
        $data['updated_at']=$updated_at['formatted'];

        $register->update($data);

        
        return redirect()->route('register.index')->with('thongbao','Cập nhật Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}