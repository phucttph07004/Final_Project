<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Excel;
use App\Models\{Student};

class ExcelController extends Controller
{
   public function student_create_excel()
   {
    return view('backend.pages.student.create_excel');
   }

   public function student_store_excel()
    {
        $import = Excel::import(new StudentsImport, request()->file('excel'));
        return redirect()->back()->with('thongbao', 'Thêm Học Viên Thành Công');
    }



}
