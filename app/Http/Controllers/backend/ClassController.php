<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\classes\{ClassRequest,ClassEditRequest};

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
    public function index(Request $request)
    {
        // if($request->all() != null && $request['page'] == null){
        //     foreach($request->all() as $key => $value){
        //         if($key == 'is_active'){
        //             $data['classes']=Classes::where("$key","$value")->paginate(10);
        //         }else{
        //             $data['classes']=Classes::where("$key",'LIKE',"%$value%")->paginate(10);
        //         }
        //     }
        // }else{
        //     $data['classes']=Classes::paginate(10);
        // }
        $data['classes']=Classes::paginate(10);
        return view('backend.pages.class.class',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        foreach(Course::all() as $value){
            $first_date = strtotime($value->start_date);
            $second_date = strtotime($value->finish_date);
            $datediff = abs($first_date - $second_date);
            $time_allowed=floor($datediff / (60*60*24)/10);
            $start_date=strtotime(date("Y-m-d", strtotime($value->start_date)) . " +$time_allowed days");
            $start_date_plus10 = strftime("%Y-%m-%d", $start_date);

            if($start_date_plus10 >= date('Y-m-d')){
                $data['courses'][]=$value;
            }
        }

        $data['levels'] = Level::all();
        return view('backend.pages.class.create-class',$data);
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
    public function update(ClassEditRequest $request, $id)
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
