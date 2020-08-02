<?php

namespace App\Http\Controllers\backend;

use App\Models\{Notification, Category, User};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\notification\{NotificationRequest, NotificationCheckCreateRequest};
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->all() != null && $request['page'] == null) {
            foreach ($request->all() as $key => $value) {
                if ($key == 'status') {
                    $data['get_all_notification'] = Notification::where("$key", "$value")->paginate(10);
                } elseif ($key == 'is_active') {
                    $data['get_all_notification'] = Notification::where("$key", "$value")->paginate(10);
                } else {
                    $data['get_all_notification'] = Notification::where("$key", 'LIKE', "%$value%")->paginate(10);
                }
            }
        } else {
            $data['get_all_notification'] = Notification::paginate(10);
        }
        return view('backend.pages.notification.index', $data);
    }

    public function destroy(Request $request, $id)
    {
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        if ($data['is_active'] != 1) {
            $data['is_active'] = 2;
        }
        $Notification = Notification::find($id);
        $Notification->update($data);
        return redirect()->back()->with('thongbao', 'Cập Nhật Trạng Thái Thành Công');
    }

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
            $data['user_id'] = Auth::user()->id;
            $preview['Notification'] = $data;
            $preview['get_users'] = User::all();
            $preview['get_categories'] = Category::all();
            return view('backend.pages.notification.preview', $preview);
        }
    }

    public function update(Request $request, $id)
    {
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        $data['user_id'] = Auth::user()->id;
        Notification::create($data);
        return redirect()->back()->with('thongbao', 'Cập Nhật Thông Báo Thành Công');
    }
}
