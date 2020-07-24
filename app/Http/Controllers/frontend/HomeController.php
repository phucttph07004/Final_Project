<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $news = factory(News::class,3)->make();
        return view('frontend.home', ['news' => $news]);
    }
    
}
