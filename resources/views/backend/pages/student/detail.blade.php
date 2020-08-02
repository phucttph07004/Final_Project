@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Thông Tin Học Viên')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Họ Tên</label>
    <input name="fullname" value="{{ $get_student->fullname }}" type="text" class="form-control" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ảnh</label>
        <img src="storage/{{ $get_student->avatar }}" alt="">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">ngày Sinh</label>
        <input name="date_of_birth" value="{{ $get_student->date_of_birth }}" type="date" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
        <input name="phone" value="{{ $get_student->phone }}"  type="number" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">email</label>
        <input name="email" value="{{ $get_student->email }}"  type="email" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
        <input name="address" value="{{ $get_student->address }}"  type="text" class="form-control" >
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Chi Nhánh</label>
        @foreach ($get_all_class as $class)
        @if($get_student->ClassName->id == $class->id)
        @foreach ($get_all_branch as $branch)
        @if($branch->id == $class->branch_id)
        <input name="branch" value="{{ $branch->branch_name }}"  type="text" class="form-control" >
        @endif
        @endforeach
        @endif
        @endforeach
      </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Lớp</label>
      <input name="address" value="{{ $get_student->ClassName->class_name }}"  type="text" class="form-control" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Level</label>
        <input name="address" value="Level : {{ $get_student->ClassName->level_id }}"  type="text" class="form-control" >
      </div>
  </form>
  @endsection



