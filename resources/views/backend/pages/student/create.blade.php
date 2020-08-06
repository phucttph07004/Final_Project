@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Thêm Mới Học Viên')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('student.store') }}" method="POST">
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
        <input name="fullname" type="text" value="{{ old('fullname') }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ảnh</label>
        <br>
        {!! ShowErrors($errors,'avatar') !!}
        <input type="file" name="avatar" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">ngày Sinh</label>
        <br>
        {!! ShowErrors($errors,'date_of_birth') !!}
        <input name="date_of_birth" value="{{ old('date_of_birth') }}" type="date" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
        <br>
        {!! ShowErrors($errors,'phone') !!}
        <input name="phone" value="{{ old('phone') }}" type="number" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">email</label>
        <br>
        {!! ShowErrors($errors,'email') !!}
        <input name="email" value="{{ old('email') }}" type="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
        <br>
        {!! ShowErrors($errors,'address') !!}
        <input name="address" value="{{ old('address') }}" type="text" class="form-control">
    </div>
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Chọn khóa học Level Và Lớp học</button>
        <br>
        {!! ShowErrors($errors,'class_id') !!}
        <ul class="dropdown-menu">

            @if($get_all_course == null)
            Các khóa học đã kết thúc hoặc quá 10% số buổi học
            @else
            @foreach ($get_all_course as $item)
            <li class="dropdown-submenu">
                <a style="width: 245px;" class="test" tabindex="-1">{{ $item->course_name }}<span style="margin-top: 8px" class="caret float-right"></span></a>
                <ul class="dropdown-menu">
                    @foreach ($get_all_level as $level)
                    <li class="dropdown-submenu">
                        <a style="padding-left: 20px" class="test">Level: {{ $level->level }}<span class="caret ml-4"></span></a>
                        <ul class="dropdown-menu">
                            <?php $i = 0 ?>
                            @foreach ($get_all_class as $class)
                            @if($class->course_id == $item->id && $class->level_id == $level->id && $class->is_active == 1)
                            <input style="margin-left: 15px;" type="radio" id="id_{{$class->id}}" name="class_id" value="{{$class->id}}">
                            <label for="id_{{$class->id}}">{{$class->name}}</label>
                            <br>
                            <?php $i++; ?>
                            @endif
                            @endforeach
                            @if($i == 0)
                            <p style="margin-left: 15px;">Chưa có lớp nào ở level và trong khóa này</p>
                            @endif
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
            @endif
        </ul>
    </div>


    <button type="submit" class="mt-5 mb-5 btn btn-primary">Thêm Học Viên</button>
</form>
<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }
</style>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.dropdown-submenu a.test').on("click", function(e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>
@endpush
