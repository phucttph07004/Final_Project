<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $news = News::paginate(6);
        return view('frontend.news',['news' => $news]);
    }

    public function getNews($id){
        $news = News::where('id','=',$id)->get();
        $relaNews = News::where('id','!=',$id)->get();
        return view('frontend.news-detail',['news'=> $news, 'news_id'=>$id,'relaNews'=>$relaNews]);
    }

}