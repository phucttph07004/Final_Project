<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Arr;
use Auth;
use App\Models\User;
use Carbon\Carbon;

class AccountController extends Controller
{

    public function show(){
        $data['user']=User::find(Auth::user()->id);
        return view('backend.pages.account.account',$data);
    }

    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        if($request->password == $user->password ){
            $data = Arr::except($request, ['_token','created_at','password'])->toarray();
        }else{
            $data = Arr::except($request, ['_token','created_at','updated_at'])->toarray();
            $data['password']=bcrypt($request->password);
        }
        $updated_at=Carbon::now()->toarray();

        if ($request->hasFile('image')) {
            $data['image']=$request->file('image')->store('images','public');
         }else{
             $data['image']=$user->avatar;
         }

        $data['updated_at']=$updated_at['formatted'];
        $user->update($data);
        return redirect()->route('account.show',Auth::user()->id)->with('thongbao','Đã Sửa Thành Công');
    }
}
