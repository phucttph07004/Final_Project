<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Notification;

class IndexController extends Controller
{
    public function index()
    {
        $data['notifications'] = Notification::where('is_active', 1)->get();
        return view('student.pages.index',$data);
    }
}
