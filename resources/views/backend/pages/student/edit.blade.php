@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Sửa Học Viên')
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
        <input name="fullname" type="text" value="{{ $get_student->fullname }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ảnh</label>
        <img src="storage/{{ $get_student->avatar }}" alt="">
        <br>
        {!! ShowErrors($errors,'avatar') !!}
        <input type="hidden" name="avatar" value="{{ $get_student->avatar }}">
        <input type="file" name="avatar" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">ngày Sinh</label>
        <br>
        {!! ShowErrors($errors,'date_of_birth') !!}
        <input name="date_of_birth" value="{{ $get_student->date_of_birth }}" type="date" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
        <br>
        {!! ShowErrors($errors,'phone') !!}
        <input name="phone" value="{{ $get_student->phone }}" type="number" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">email</label>
        <br>
        {!! ShowErrors($errors,'email') !!}
        <input name="email" value="{{ $get_student->email }}" type="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
        <br>
        {!! ShowErrors($errors,'address') !!}
        <input name="address" value="{{ $get_student->address }}" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Khóa Học</label>
        @foreach($get_all_course as $course)
        @if($course->id == $get_student->ClassName->course_id)
        <input value="{{ $course->course_name }}" readonly type="text" class="form-control">
        @endif
        @endforeach
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Level</label>
        @foreach($get_all_level as $level)
        @if($level->id == $get_student->ClassName->level_id)
        <input value="Level :{{ $level->level }}" readonly type="text" class="form-control">
        @endif
        @endforeach
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">lớp Học</label>
        <input name="class_id" value="{{ $get_student->ClassName->name }}" readonly type="text" class="form-control">
        <input name="class_id" value="{{ $get_student->ClassName->id }}" type="hidden">
    </div>
    {!! ShowErrors($errors,'class_id') !!}
    <div class="form-group ">
        <span class="error_level" style="color: red"></span>
        <br>
        {!! ShowErrors($errors,'level_id') !!}
        <select class="form-control h-100 mt-2" name="level_id" id="Level">
            <option value="">Chọn Level</option>
            @foreach($get_all_level as $level)
            <option value="{{$level->id}}">Level: {{$level->level}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group ">
        <br>
        {!! ShowErrors($errors,'slot_add') !!}
        <select class="form-control h-100 mt-2" name="slot_add" id="slot">
            <option value="">Chọn Ca</option>
            <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
            <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
            <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
            <option value="4">Ca 4 ( 3h45 đến 5h45 )</option>
            <option value="5">Ca 5 ( 6h đến 8h )</option>
            <option value="6">Ca 6 ( 8h15 đến 10h15 )</option>
        </select>
    </div>
    <div class="form-group ">
        <div class="row paste_class">
            {{-- show class --}}
        </div>
    </div>
    @if($check_course == null)
    <input type="hidden" id="check_course" value="0">
    @else
    <input type="hidden" id="check_course" value="1">
    @endif
    <button type="submit" class="mt-5 mb-5 btn btn-primary">Xác Nhận Sửa Học Viên</button>
</form>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#Level').change(function() {
            if ($('#Level').val() != 0) {
                $('.error_level').html('');
                $("#slot option[value='']").prop("selected", "selected")
            }
        });
        $('#slot').on('change', function() {
            if($('#check_course').val() == 0){
                html = "<p class='pl-4'>khóa học và lớp đã kết thúc hoặc quá 10% số buổi, nên không thể thay đổi lịch</p>"
                $('.paste_class').html(html);
            }else{
                if ($('#Level').val() == 0) {
                $('.error_level').html('Không được bỏ trống level');
            } else {
                $.ajax({
                    url: '/admin/student/create/selected/' + $(this).val() + '/' + $('#Level').val(),
                    method: 'get',
                    success: function(response) {
                        // đổ dữ liệu
                        if (response == -1) {
                            html = "<p class='pl-4'>Các khóa học đã kết thúc hoặc quá 10% số buổi học viên sẽ không đổi được ca và lớp học</p>"
                        } else {
                            if (response.length === 0) {
                                html = "<p class='pl-4'>Chưa có lớp nào trong ca này</p>"
                            } else {
                                html = "";
                                response.map(x => {
                                    html += `
                            <div class="form-check col-3">
                            <input class="form-check-input" type="radio" name="class_id" id="${x.id}" value="${x.id}">
                            <label class="form-check-label ml-2 pl-4" for="${x.id}">
                                ${x.name}
                            </label>
                            </div>
                            `;
                                })
                            }
                        }
                        $('.paste_class').html(html);
                    }
                });
            }
            }
        });
    });
</script>
@endpush