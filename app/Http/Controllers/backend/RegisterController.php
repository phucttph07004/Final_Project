<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;

use App\Models\Register;
use App\Models\Test;
use App\Http\Requests\frontend\register\RegisterRequest;

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
    public function index(Request $request)
    {   
        if($request->all() != null && $request['page'] == null){
            foreach($request->all() as $key => $value){
                if($key == 'is_active'){
                    $data['get_all_register'] = Register::where("$key","$value")->paginate(10);
                }else{
                    $data['get_all_register'] = Register::where("$key",'LIKE',"%$value%")->paginate(10);
                }
            }
        }else{
            $data['get_all_register']=Register::paginate(10);
        }
        return view('backend.pages.register.index',$data);
    }

    public function destroy($id)
    {
        $registers = Register::find($id);

        $data['is_active'] = 1;

        $registers->update($data);

        return redirect()->back();
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
        $data['get_register'] = Register::find($id);
        return view('backend.pages.register.edit',$data);
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
        $data = Arr::except($request, ['_token','_method'])->toarray();
        $register=Register::find($id);
        $register->update($data);
        return redirect()->back()->with('thongbao','Cập Nhật Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}