@extends('./backend/layout/master')
@section('title','Quản Trị Lớp Học')
@section('title_page','Chi tiết Lớp Học')
@section('content')
<form role="form" method="POST" action="{{ route('class.update', $class->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="">Tên lớp</label>
            <input type="text" readonly="readonly" class="form-control" name="name" id="" value="{{ $class->name }}">
            {!! ShowErrors($errors,'name') !!}
        </div>
        <div class="form-group">
            <label for="">Giáo viên</label>
            <input type="text" readonly="readonly" class="form-control" name="teacher_id" id="" value="{{ $class->teacher_id }}">
        </div>
        <div class="form-group">
            <label for="">Level</label>
            <input type="text" readonly="readonly" class="form-control" name="level_id" id="" value="{{ $class->level_id }}">
        </div>
        <div class="form-group">
            <label for="">Khoá</label>
            <input type="text" readonly="readonly" class="form-control" name="course_id" id="" value="{{ $class->course_id }}">
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <input type="text" readonly="readonly" class="form-control" name="is_active" id="" 
                    @if($class->is_active == 0) value="Khoá"
                    @else value="Hoạt động"
                    @endif
            
            >
        </div>
        <div class="form-group">
            <label for="">Người tạo</label>
            <input type="text" readonly="readonly" class="form-control" name="user_id" id="" value="{{$class->userName->fullname}}">
        </div>
    </div>
    <div class="card-footer">
        <a href="{{route('class.index')}}" class="btn btn-danger">Quay lại</a>
    </div>

    </section>
    @endsection