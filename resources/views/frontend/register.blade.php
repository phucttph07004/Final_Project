@extends('frontend.layout.layout')
@section('content')
<section class="auth__form">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            @if(session('thongbao'))
            <div class="alert alert-primary" role="alert">
                {{session('thongbao')}}
            </div>
            @endif
            <div class="col-6">
                <h1 class="">Đăng Ký Kiểm Tra Đầu Vào</h1>
                <form class="" action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="fullname" id="full_name"
                            placeholder="Họ và tên">
                        {!! ShowErrors($errors,'fullname') !!}
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" name="date_of_birth" id="date_of_birth"
                            placeholder="Ngày Sinh">
                        {!! ShowErrors($errors,'date_of_birth') !!}
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" id="phone_number"
                            placeholder="Số điện thoại">
                        {!! ShowErrors($errors,'phone') !!}
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="address" id="address" placeholder="Địa chỉ">
                        {!! ShowErrors($errors,'address') !!}
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" id="email" placeholder="Email">
                        {!! ShowErrors($errors,'email') !!}
                    </div>
                    <button type="submit" class="btn">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection