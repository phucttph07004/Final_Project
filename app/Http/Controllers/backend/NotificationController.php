<?php

namespace App\Http\Controllers\backend;
use App\Models\{Notification,Category};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\notification\NotificationRequest;
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function index(){
        $data['get_all_notification']=Notification::paginate(5);
        return view('backend.pages.notification.index',$data);
    }
    public function destroy($id){
        Notification::destroy($id);
        return redirect()->back()->with('thongbao','Xóa Thành Công');
    }
    public function show(Notification $Notification ){
        $data['Notification']=$Notification;
        return view('backend.pages.notification.detail',$data);
    }

    public function create(){
        $data['get_all_category']=Category::all();
        return view('backend.pages.notification.create',$data);
    }
    public function store(NotificationRequest $request){
        $data = Arr::except($request, ['_token'])->toarray();
        $data['user_id']=1;
        // $data['user_id']=Auth::user()->id;
        Notification::create($data);
        return redirect()->back()->with('thongbao','Gửi Thông Báo Thành Công');
    }


    public function edit(Notification $Notification){
        $data['Notification']=$Notification;
        $data['get_all_category']=Category::all();
        return view('backend.pages.notification.edit',$data);
    }

    public function update(NotificationRequest $request,$id){
        $data = Arr::except($request, ['_token','_method'])->toarray();
        $data['user_id']=1;
        // $data['user_id']=Auth::user()->id;
        $Notification->update($data);
        return redirect()->back()->with('thongbao','Cập Nhật Thông Báo Thành Công');
    }







}
