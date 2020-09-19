<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{News};
use Arr;
use Auth;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function index()
    {
        
    }

    public function edit($id)
    {
        $data['about'] = News::find($id);
        return view('backend.pages.setting.edit-about',$data);
    }

    public function update($id)
    {
        $about = News::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $update=Carbon::now()->toarray();

        $about->update($data);

        return redirect()->route('setting.index')->with('thongbao','Cập nhập thành công');

    }
}
