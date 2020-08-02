@extends('./backend/layout/master')
@section('title','Quản Trị Tài Khoản')
@section('title_page','Thêm Mới Tài Khoản')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('user.store') }}" method="POST">
    @csrf
    @if(session('thongbao'))
    <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
    </div>
    @endif
    <div class="form-group">
        <label for="exampleFormControlInput1">Họ Tên</label>
        <br>
        {!! ShowErrors($errors,'fullname') !!}
        <input name="fullname" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ảnh</label>
        <br>
        {!! ShowErrors($errors,'avatar') !!}
        <input type="file" name="avatar" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ngày Sinh</label>
        <br>
        {!! ShowErrors($errors,'date_of_birth') !!}
        <input name="date_of_birth" type="date" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
        <br>
        {!! ShowErrors($errors,'phone') !!}
        <input name="phone" type="number" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <br>
        {!! ShowErrors($errors,'email') !!}
        <input name="email" type="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Mật khẩu</label>
        <br>
        {!! ShowErrors($errors,'email') !!}
        <input name="password" type="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
        <br>
        {!! ShowErrors($errors,'address') !!}
        <input name="address" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="role">Vai trò</label>
        <br>
        <select class="form-control" name="role" id="role">
            <option value="5">Giám đốc chi nhánh</option>
            <option value="4">Giáo viên</option>
            <option value="3">Trợ giảng</option>
            <option value="2">Admin</option>
        </select>
    </div>
    <div class="d-flex align-items-center">
    <a class="btn btn-danger mr-4" href="{{route('user.index')}}">Quay lại</a>

        <button type="submit" class="btn btn-primary">Thêm Tài Khoản</button>
    </div>

    </div>

</form>
@endsection