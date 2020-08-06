@extends('frontend.layout.layout')
@section('content')

<section class="auth__form">

    <div class="container">
    
        <div class="row align-items-center justify-content-center">
            <div class="col-6">
            @if(session('thongbao'))
            <div class="alert alert-primary" role="alert">
                {{session('thongbao')}}
            </div>
            @endif
                <h1 class="">Đăng Ký Kiểm Tra Đầu Vào</h1>
               
                <form class="" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="fullname" id="full_name"
                            placeholder="Họ và tên">

                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="phone" id="phone"
                            placeholder="Số điện thoại" >

                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" id="email"
                            placeholder="Email" >

                    </div><div class="form-group">
                        <input class="form-control" type="address" name="address" id="address"
                            placeholder="Địa chỉ" >

                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" name="date_of_birth" id="date_of_birth"
                            placeholder="Ngày Sinh">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="level">
                            <option value="">Level</option>
                            @foreach ($get_all_level ?? '' as $item)
                            <option value="{{ $item->level }}">{{ $item->level }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="note" id="note"
                            placeholder="Ghi chú"></textarea>
       
                    </div>
                    <button type="submit" class="btn">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection