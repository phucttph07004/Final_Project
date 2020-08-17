@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Thêm Mới Học Viên')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5 col-10" action="{{ route('student.store') }}" method="POST">
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
        <input name="class_id" value="" type="hidden">
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
    <button type="submit" class="mt-5 mb-5 btn btn-primary">Thêm Học Viên</button>
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
            if ($('#Level').val() == 0) {
                $('.error_level').html('Không được bỏ trống level');
            } else {
                $.ajax({
                    url: '/admin/student/create/selected/' + $(this).val() + '/' + $('#Level').val(),
                    method: 'get',
                    success: function(response) {
                        // đổ dữ liệu
                        if (response == -1) {
                            html = "<p class='pl-4'>Các khóa học đã kết thúc hoặc quá 10% số buổi học viên sẽ được lưu vào danh sách chờ </p>"
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
        });
    });
</script>
@endpush
