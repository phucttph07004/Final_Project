@extends('frontend.layout.layout')
@section('content')

<section class="auth__form">

    <div class="container">
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
            {{session('thongbao')}}
        </div>
        @endif
        <div class="row align-items-center justify-content-center">
            <div class="col-6">
                <h1 class="">Đăng Ký Kiểm Tra Đầu Vào</h1>
               
                <form class="" action="{{ route('enrollment.store') }}" method="POST">
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
                            placeholder="Ngày sinh">
                    </div>
                    <div class="form-group">
                        <select style="background-color:#f7f2ea; height:65px; border:0px; padding-left:30px;font-size: 18px" class="form-control" name="level_id">
                            <option value="">Level</option>
                            @foreach ($get_all_level ?? '' as $item)
                            <option value="{{ $item->id }}">{{ $item->level }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select style="background-color:#f7f2ea; height:65px; border:0px; padding-left:30px; font-size: 18px" class="form-control" name="slot">
                            <option value="">Ca học mong muốn</option>
                            <option value="1">Ca 1: 8h-9h30</option>
                            <option value="2">Ca 2: 10h-11h30</option>
                            <option value="3">Ca 3: 14h-15h30</option>
                            <option value="4">Ca 4: 16h-17h30</option>
                            <option value="5">Ca 5: 18h-19h30</option>
                            <option value="6">Ca 3: 20h-21h30</option>

                        </select>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>
@endsection