<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\auth\LoginRequest;

use App\Models\User;
use App\Models\Student;
use Auth;
use Arr;

class AuthController extends Controller
{
    //

    public function getLoginForm(){
        if(Auth::check()){
            return redirect('admin');
        }
        return view('backend.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        
        if($result = Auth::attempt($data)){
            if(Auth::User()->is_active == 0 ){
                return redirect()->back()->with('thongbao','Tài Khoản Của Bạn Đã Bị Khóa');
            }else{
                return redirect('admin');
            }
        }else{
            return redirect()->back()->with('thongbao','Bạn Nhập sai tài khoản hoặc mật khẩu');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
