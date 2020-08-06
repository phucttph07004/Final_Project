<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\User;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index(){
        $news = News::where('is_active', 1 )->where('type','new')->OrderBy('id','desc')->limit(3)->get();
        $teachers = User::where('role', 4)->get();
        $settings = Setting::limit(1)->get();
        return view('frontend.home', ['news' => $news,'settings' => $settings,'teachers' => $teachers]);
    }
}
