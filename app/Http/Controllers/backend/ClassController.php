<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\classes\ClassRequest;

use App\Models\{Classes,Course,Level,User};

use Arr;
use Auth;
use Carbon\Carbon;


class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::paginate(10);
        return view('backend.pages.class.class',['classes' => $classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $levels = Level::all();
        $courses = Course::all();
        return view('backend.pages.class.create-class',compact('levels','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        $data['user_id'] = Auth::user()->id;
        $data['is_active'] = '1';

        Classes::create($data);

        return redirect()->route('class.index')->with('thongbao','Thêm lớp thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['class'] = Classes::find($id);
        return view('backend.pages.class.detail-class',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['class'] = Classes::find($id);
        $teachers = User::where('role', 4 )->get();
        $levels = Level::all();
        $courses = Course::all();
        return view('backend.pages.class.edit-class',$data,['levels' => $levels,'courses' => $courses,'teachers'=>$teachers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRequest $request, $id)
    {
        $classes = Classes::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);
        $update_at = Carbon::now()->toarray();
        $data['update_at'] = $update_at['formatted'];

        $classes->update($data);

        return redirect()->route('class.index')->with('thongbao','Cập nhật lớp học thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        $class = Classes::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);

        if($data['is_active'] == 0){
            $data['is_active'] = 1;
        }
        else {
            $data['is_active'] = 0;
        }

        $class->update($data);

        return redirect()->back();
    }
}
