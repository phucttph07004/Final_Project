<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\backend\auth\LoginRequest;

use App\Models\User;
use Auth;

class AuthController extends Controller
{
    //

    public function getLoginForm(){
        if(Auth::check()){
            return redirect()->route('admin');
        }
        return view('backend.auth.login');
    }

    public function login(LoginRequest $request)
    {
        
        $data = Arr::except($request->all(), ['_token']);
        // dd($data);
        $result = Auth::attempt($data);
        // dd($result);
        return redirect('admin');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
