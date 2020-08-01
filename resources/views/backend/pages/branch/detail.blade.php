@extends('./backend/layout/master')
@section('title','Quản Trị Chi Nhánh')
@section('title_page','Thêm Mới Chi Nhánh')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="row">
<form class="col-5 mt-5 ml-5 pt-3">
    <div class="form-group">
        <label for="exampleFormControlInput1">Tên Chi Nhánh</label>
        <input value="{{ $get_branch->branch_name }}"  type="text" class="form-control" >
      </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Địa Chỉ Chi Nhánh</label>
            <input value="{{ $get_branch->address }}" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh Chi Nhánh</label>
          <img class="ml-2" width="315" height="150" src="storage/{{ $get_branch->avatar }}" alt="">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Ngày Tạo</label>
            <input value="{{ Carbon\carbon::parse($get_branch->created_at)->format('d-m-Y') }}" type="" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Ngày Cập Nhật</label>
            <input value="{{ Carbon\carbon::parse($get_branch->created_at)->format('d-m-Y') }}" type="" class="form-control" >
          </div>
  </form>
<div class="col-5 ml-5 mt-5 pt-3">
    <div class="form-group">
      <label for="exampleFormControlInput1">Họ Tên Giám Đốc</label>
      <a class="form-control" href="/user">
      {{ $get_branch->directorName->fullname }}
        </a>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ảnh</label>
        <a href="/user">
        <img width="150px" src="storage/{{ $get_branch->directorName->id }}" alt="">
        </a>
      </div>
</div>
</div>
</div>
</div>
  @endsection
