@extends('./backend/layout/master')
@section('title','Quản Trị Lớp')
@section('title_page','Thêm Mới Lớp')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('class.store') }}" method="POST">
    @csrf
    @if(session('thongbao'))
    <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
    </div>
    @endif
    <div class="form-group">
        <label for="">Tên lớp</label>
        <br>
        {!! ShowErrors($errors,'name') !!}
        <input name="name" type="text" value="{{ old('name')}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Level</label>
        <br>
        {!! ShowErrors($errors,'level_id') !!}
        <select name="level_id" class="form-control">
            @foreach ($levels as $level)
            <option value="{{ $level->id }}">{{ $level->level }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Khoá</label>
        <br>
        {!! ShowErrors($errors,'course_id') !!}
        <select name="course_id" class="form-control">
            @foreach ($courses as $course)
            <option value="{{ $course->id }}">{{ $course->course_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Số buổi học</label>
        <br>
        {!! ShowErrors($errors,'number_of_sessions') !!}
        <input name="number_of_sessions" type="text" value="{{ old('number_of_sessions')}}" class="form-control">
    </div>
    <div class="d-flex align-items-center">
        <a class="btn btn-danger mr-4" href="{{route('class.index')}}">Quay lại</a>
        <button type="submit" class="btn btn-primary">Thêm Lớp</button>
    </div>

    </div>

</form>
@endsection