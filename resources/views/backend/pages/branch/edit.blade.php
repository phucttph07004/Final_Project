@extends('./backend/layout/master')
@section('title','Quản Trị Chi Nhánh')
@section('title_page','Chỉnh Sửa Chi Nhánh')
@section('content')
<form enctype="multipart/form-data" class="col-10 pl-5 pb-5 pt-5" action="{{ route('branch.update',"$get_branch->id") }}" method="POST">
    @csrf
    @method('PUT')
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif

        <div class="form-group">
            <label for="exampleFormControlInput1">Địa Chỉ Chi Nhánh</label>
          <br>
            {!! ShowErrors($errors,'address') !!}
        <input name="address" type="text" value="{{ $get_branch->address }}" class="form-control" >
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Tên Chi Nhánh</label>
          <br>
            {!! ShowErrors($errors,'branch_name') !!}
            <input name="branch_name" value="{{ $get_branch->branch_name }}" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh Chi Nhánh</label>
          <br>
            {!! ShowErrors($errors,'avatar') !!}
            <input name="avatar" value="{{ $get_branch->avatar }}" type="hidden" class="form-control" >
            <input name="avatar" type="file" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Giám Đốc Chi Nhánh</label>
            <br>
            @if(session('error'))
            <span style='color: red'>{{session('error')}}</span>
            @endif
              {!! ShowErrors($errors,'director_id') !!}
            <select class="form-control" name="director_id" id="type">
              @foreach ($get_all_user as $item)
              @if($item->type == "branch_manager")
            <option  @if($item->id == $get_branch->director_id) selected  @endif value="{{ $item->id }}">{{ $item->fullname }}</option>
            @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Trạng Thái</label>
          <br>
            {!! ShowErrors($errors,'error2') !!}
            <select class="form-control"  name="status" id="">
                <option @if($get_branch->status ==1) selected @endif value="1">Hoạt Động</option>
                <option @if($get_branch->status ==2) selected @endif value="2">Tạm Dừng</option>
            </select>
          </div>
    <button style="submit" class="mb-5 btn btn-primary">Sửa Chi Nhánh</button>
  </form>
  @endsection



