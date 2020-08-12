<?php

namespace App\Http\Controllers\backend;
use App\Models\{Level,Classes};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\level\{LevelRequest,LevelRequestEdit};
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class LevelController extends Controller
{
    public function index(){
        $data['get_all_level']=Level::withcount('CountClass')->paginate(10);
        return view('backend.pages.level.index',$data);
    }

    public function destroy($id){
        Level::destroy($id);
        return redirect()->back()->with('thongbao','Xóa Thành Công');
    }

    public function create(){
        return view('backend.pages.level.create');
    }

    public function store(LevelRequest $request){
        $data = Arr::except($request, ['_token'])->toarray();
        Level::create($data);
        return redirect()->back()->with('thongbao','Thêm Level Thành Công');
    }

    public function show($id){
        $data['course'] = Level::find($id);
        $data['classes']=Classes::where('level_id','=',$id)->get();
        return view('backend.pages.level.detail',$data);
    }

    public function edit(Level $level){
        $data['get_level']=$level;
        return view('backend.pages.level.edit',$data);
    }

    public function update(LevelRequestEdit $request,$id){
        $data = Arr::except($request, ['_token','_method'])->toarray();
        $level=Level::find($id)->first();
        $level->update($data);
        return redirect()->back()->with('thongbao','Cập Nhật level Thành Công');
    }


}
