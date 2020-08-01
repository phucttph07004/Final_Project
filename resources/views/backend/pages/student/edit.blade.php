@extends('./backend/layout/master')
@section('title','Quản Trị Học Sinh')
@section('title_page','Sửa  Học Sinh')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('student.update',"$get_student->id") }}" method="POST">
    @csrf
    @method('PUT')
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif
    <div class="form-group">
      <label for="exampleFormControlInput1">Họ Tên</label>
    <br>
      {!! ShowErrors($errors,'fullname') !!}
    <input name="fullname" value="{{ $get_student->fullname }}" type="text" class="form-control" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ảnh</label>
        <img src="storage/{{ $get_student->avatar }}" alt="">
        <input name="avatar" value="{{ $get_student->avatar }}" type="hidden" >
      <br>
        {!! ShowErrors($errors,'avatar') !!}
        <br>
        <input type="file" name="avatar" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">ngày Sinh</label>
      <br>
        {!! ShowErrors($errors,'date_of_birth') !!}
        <input name="date_of_birth" value="{{ $get_student->date_of_birth }}" type="date" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
      <br>
        {!! ShowErrors($errors,'phone') !!}
        <input name="phone" value="{{ $get_student->phone }}" type="number" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">email</label>
      <br>
        {!! ShowErrors($errors,'email') !!}
        <input name="email" value="{{ $get_student->email }}" type="email" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
      <br>
        {!! ShowErrors($errors,'address') !!}
        <input name="address" value="{{ $get_student->address }}" type="text" class="form-control" >
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Lớp hiện tại</label>
        <input  value="{{ $get_student->ClassName->class_name }}" readonly type="text" class="form-control" >
        <input name="class_id" value="{{ $get_student->ClassName->id }}" type="hidden" class="form-control" >
      </div>
      <div class="form-group">
          <label for="exampleFormControlSelect1">Level hiện tại</label>
          <input readonly value="Level : {{ $get_student->ClassName->level_id }}"  type="text" class="form-control" >
        </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Sửa Đổi Lever và lớp</label>
      <br>
        {!! ShowErrors($errors,'class_id') !!}
    <div class="row">
        @foreach ($get_all_level as $item)
        <div class="form-group ">
        <a class="nav-link pl-2" data-toggle="dropdown" href="#">
            level :{{$item->level}}
            <i class="fa fa-angle-down" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu">
            <p class="pl-2 pr-5">Danh Sách Lớp  level :{{$item->level}}</p>
            @foreach($get_all_class as $value)
            @if($value->level_id == $item->id)
            <div class="col-12">
            <input type="radio" id="id_{{$value->id}}" name="class_id" value="{{$value->id}}">
            <label for="id_{{$value->id}}">{{$value->class_name}}</label>
            </div>
            @endif
            @endforeach
    </div>
</div>
@endforeach
    </div>
    <button type="submit" class="mb-5 btn btn-primary">Sửa Học Sinh</button>
  </form>
  @endsection



