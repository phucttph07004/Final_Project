<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\auth\LoginRequest;

use App\Models\Student;
use Auth;
use Arr;

class AuthController extends Controller
{
    public function getLoginForm(){
        return view('student.auth.login');
    }

    public function login(LoginRequest $request)
    {

        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        //kiểm tra trường remember có được chọn hay không
        
        if (Auth::guard('student')->attempt($arr)) {

            dd('đăng nhập thành công');
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {

            dd('tài khoản và mật khẩu chưa chính xác');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
        
        // if($result = Auth::attempt($data)){
        //     if(Auth::User()->status == 0 ){
        //         return redirect()->route('auth.login')->with('thongbao','Tài Khoản Của Bạn Đã Bị Khóa');
        //         echo 'lock';
        //     }else{
        //         return redirect('admin');
        //         echo 'unlock';
        //     }
        // }else{
        //     return redirect()->back()->with('thongbao','Bạn Nhập sai tài khoản hoặc mật khẩu');
        // }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('student.login');
    }
}
