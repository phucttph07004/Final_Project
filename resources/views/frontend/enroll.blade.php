@extends('frontend.layout.layout')
@section('content')
<section class="auth__form">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-6">
                <h1 class="">Đăng Ký Kiểm Tra Đầu Vào</h1>
                <form class="" action="{{route('enroll')}}" method="POST">
                @csrf
                    <input class="form-control" type="text" name="fullname" id="full_name" placeholder="Họ và tên">
                    <input class="form-control" type="date" name="date_of_birth" id="date_of_birth" placeholder="Ngày Sinh">
                    <input class="form-control" type="text" name="phone" id="phone_number" placeholder="Số điện thoại">
                    <input class="form-control" type="text" name="address" id="address" placeholder="Địa chỉ">
                    <input class="form-control" type="hidden" value="0" name="is_active" id="is_active" placeholder="is_active">
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email">
                    <button type="submit" class="btn">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection