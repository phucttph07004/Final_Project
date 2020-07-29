<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Setting;

class NewsController extends Controller
{
    public function index(){
        $settings = Setting::All();
        $news = News::where('type','new')->OrderBy('created_at','desc')->paginate(6);
        return view('frontend.news',['news' => $news,'settings' => $settings]);
    }

    public function getNews($id){
        $news = News::where('id','=',$id)->get();
        $relaNews = News::where('id','!=',$id)->orderBy('created_at','desc')->limit(3)->get();
        return view('frontend.news-detail',['news'=> $news, 'news_id'=>$id,'relaNews'=>$relaNews]);
    }

}