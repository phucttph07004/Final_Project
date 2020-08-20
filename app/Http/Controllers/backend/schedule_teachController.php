<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\{Classes, Level, Schedule,User};
use Illuminate\Http\Request;

class schedule_teachController extends Controller
{
    public function index(){

        $data['get_schedule'] = Schedule::all();
        $data['get_all_user'] = User::all();


        // lấy ra các lớp trong  bảng
        if ($data['get_schedule'] != null) {
            $class = array();
            foreach ($data['get_schedule'] as $value) {
                if (array_search($value->class_id, $class) === false) {
                    $class[] = $value->class_id;
                }
            }
            $collection=array();
            foreach (Classes::all() as $value) {
                if (array_search($value->id, $class) !== false) {
                    $collection[] = Classes::where('id', $value->id)->withcount('CountStuden')->first();
                }
            }
            $data['get_all_class'] = collect($collection);
            return view('backend.pages.schedule_teach.index', $data);
        }

        // xếp giáo iên thì thêm id vào cả của bảng class





        // foreach (Classes::all() as $value) {
        //     if (array_search($value->id, $class) === false) {
        //         $collection[] = Classes::where('id', $value->id)->withcount('CountStuden')->first();
        //     }
        // }
        // $data['check'] = true;
        // $data['get_all_class'] = collect($collection);









    }


















}
