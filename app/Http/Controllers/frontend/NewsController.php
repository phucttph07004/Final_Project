<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
       public function index(){
        $news = News::all();
        return view('frontend.news', ['news' => $news]);
       }
}