<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\register\RegisterRequest;

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
    public function index(Request $request)
    {
        if($request->all() != null){
            foreach($request->all() as $key => $value){
                if($key == 'is_active'){
                    $registers=Register::where("$key","$value")->paginate(10);
                }else{
                    $registers=Register::where("$key",'LIKE',"%$value%")->paginate(10);
                }
            }
        }else{
            $registers = Register::orderBy('created_at','desc')->paginate(10);
        }

       
        return view('backend.pages.register.register',['registers' => $registers]);
    }

    public function destroy($id)
    {
        $registers = Register::find($id);

        $data['is_active'] = 1;

        $registers->update($data);

        return redirect()->back();
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
    public function update(RegisterRequest $request, $id)
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