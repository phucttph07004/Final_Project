<?php

namespace App\Http\Controllers\backend;

use App\Models\{Branch,User};
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\branch\{BranchRequest,BranchRequestEdit};
use Illuminate\Http\Request;
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class BranchController extends Controller
{
    public function index(Request $request){
        if($request->all() != null){
            foreach($request->all() as $key => $value){
                if($key == 'status'){
                    $data['get_all_branch']=Branch::where("$key","$value")->paginate(10);
                }else{
                    $data['get_all_branch']=Branch::where("$key",'LIKE',"%$value%")->paginate(10);
                }
            }
        }else{
            $data['get_all_branch']=Branch::paginate(10);
        }
        return view('backend.pages.branch.index',$data);
    }

    // public function destroy($id){
    //     Branch::destroy($id);
    //     return redirect()->back()->with('thongbao','Xóa Thành Công');
    // }

    public function create(){
        $data['get_all_user']=User::all();
        return view('backend.pages.branch.create',$data);
    }

    public function store(BranchRequest $request){
        $newBranch = Arr::except($request, ['_token'])->toarray();
        if(User::where([['id', $request['director_id']],['type','branch_manager']])->first()  == null ){
            return redirect()->back()->with('error','Không Được Thay Đổi Dữ Liệu');die;
        }else{
        $newBranch['avatar']=$request->file('avatar')->store('images','public');
        $newBranch['status']=1;
        Branch::create($newBranch);
        return redirect()->back()->with('thongbao','Thêm Chi Nhánh Thành Công');
        }
    }

    public function show(Branch $branch){
        $data['get_branch']=$branch;
        return view('backend.pages.branch.detail',$data);
    }

    public function edit(Branch $branch){
        $data['get_all_user']=User::all();
        $data['get_branch']=$branch;
        return view('backend.pages.branch.edit',$data);
    }

    public function update(BranchRequestEdit $request ,$id){
        $updateBranch = Arr::except($request, ['_token'])->toarray();
        if(User::where([['id', $request['director_id']],['type','branch_manager']])->first()  == null ){
            return redirect()->back()->with('error','Không Được Thay Đổi Dữ Liệu');
        }else{
        $Branch=Branch::find($id)->first();
        $Branch->update($updateBranch);
        return redirect()->back()->with('thongbao','Cập Nhật Thành Công');
    }

}
}
