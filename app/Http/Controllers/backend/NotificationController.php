<?php

namespace App\Http\Controllers\backend;

use App\Models\{Notification, Category, User};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\notification\NotificationRequest;
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function index()
    {
        $data['get_all_notification'] = Notification::paginate(5);
        return view('backend.pages.notification.index', $data);
    }
    // public function destroy($id){
    //     Notification::destroy($id);
    //     return redirect()->back()->with('thongbao','Xóa Thành Công');
    // }
    public function show(Notification $Notification)
    {
        $data['Notification'] = $Notification;
        return view('backend.pages.notification.detail', $data);
    }

    public function create()
    {
        $data['get_all_category'] = Category::all();
        return view('backend.pages.notification.create', $data);
    }

    public function store(NotificationRequest $request)
    {
        if (count(Category::where('id', $request['category_id'])->get()) == 0 || ($request['status'] != '1' &&     $request['status'] != '2')) {
            return redirect()->back()->with('error', 'Không Được Thay Đổi Dữ Liệu');
        } else {
            $data = Arr::except($request, ['_token'])->toarray();
            $data['user_id'] = 1;
            // $data['user_id']=Auth::user()->id;

            $preview['Notification'] = $data;
            $preview['get_users'] = User::all();
            $preview['get_categories'] = Category::all();
            return view('backend.pages.notification.preview', $preview);
                // dd($request->all());
                // $data['user_id'] = 1;
                // // $data['user_id']=Auth::user()->id;
                // Notification::create($data);
                // return redirect()->back()->with('thongbao', 'Tạo Thông Báo Thành Công');
        }
    }


    // public function edit(Notification $Notification)
    // {
    //     $data['Notification'] = $Notification;
    //     $data['get_all_category'] = Category::all();
    //     return view('backend.pages.notification.edit', $data);
    // }

    public function update(NotificationRequest $request)
    {
        dd($request->all());
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        $data['user_id'] = 1;
        // $data['user_id']=Auth::user()->id;
        $Notification = Notification::find($id)->first();
        $Notification->update($data);
        return redirect()->back()->with('thongbao', 'Cập Nhật Thông Báo Thành Công');
    }
}
