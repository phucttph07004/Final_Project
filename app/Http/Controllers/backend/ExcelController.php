<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\{Notification, Category, User};
use App\Http\Requests\backend\notification\NotificationRequest;
use Illuminate\Http\Request;
use PHPExcel;
use PHPExcel_IOFactory;
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class ExcelController extends Controller
{

//     public function student_store_default(NotificationRequest $request)
//    {
//        echo "fdsfds";die;
//     if (count(Category::where('id', $request['category_id'])->get()) == 0 || ($request['status'] != '1' &&     $request['status'] != '2')) {
//         return redirect()->back()->with('error', 'Không Được Thay Đổi Dữ Liệu');
//     } else {
//         $data = Arr::except($request, ['_token'])->toarray();
//         $data['user_id'] = 1;
//         // $data['user_id']=Auth::user()->id;
//         Notification::create($data);
//         return redirect()->back()->with('thongbao', 'Tạo Thông Báo Thành Công');
//         }
//     }

   public function student_create_excel()
   {
    return view('backend.pages.student.create_excel');
   }

   public function student_store_excel()
   {
       // lấy ra file tải lên
       $file=$_FILES['excel']["tmp_name"];
       // load
       $objPHPExcel = PHPExcel_IOFactory::load($file);
       // lấy ra các sheet
       $objWorksheet = $objPHPExcel->getActiveSheet();
       // lấy ra tổng số row
       $highestRow = $objWorksheet->getHighestRow();
       // chuyển dữ liệu thành mảng
       $SheetData=$objWorksheet->toArray('null',true,true,true);

       for ($row = 2; $row <= $highestRow; $row++) {
           $ky_thu =$SheetData[$row]['A'];
           $hoc_ky =$SheetData[$row]['B'];
           $mon =$SheetData[$row]['C'];
           $ma_mon =$SheetData[$row]['D'];
           $so_tin =$SheetData[$row]['E'];
           $diem =$SheetData[$row]['F'];
           $trang_thai =$SheetData[$row]['G'];
       }
    // return view('backend.pages.student.create_excel');
   }



}
