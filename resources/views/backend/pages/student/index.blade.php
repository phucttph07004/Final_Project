@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Quản Trị Học Viên')
@section('content')
<div class="col-12">
    <div style="padding-left: 45px" class="row bg-light form-inline">
        <div class="col-5"></div>
        <div class="col-7">
            <div class="row pl-5">
            <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc Theo Trạng Thái
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-student" href="/admin/student">Tất Cả</a>

                    <a class="dropdown-student" href="/admin/student?fee_status=1">Đã Lộp Tiền</a>
                    <a class="dropdown-student" href="/admin/student?fee_status=0">Chưa Lộp Tiền</a>

                    <a class="dropdown-student" href="/admin/student?status=1">Hoạt Động</a>
                    <a class="dropdown-student" href="/admin/student?status=0">Bảo Lưu</a>
                </div>
            </div>
        <div style="width: 300px;">
                <form class="form-inline pt-4">
                    <input name="fullname" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Theo Tên Học Viên" aria-label="Search">
                    <a>
                        <button class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </a>
                </form>
        </div>
    </div>
        </div>
</div>
</div>
<table style="background-color: white" class="table ml-5 col-12">
    @if(session('thongbao'))
    <div class="alert alert-primary text-center" role="alert">
        {{session('thongbao') }}
    </div>
    @endif
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Mã Học Viên</th>
            <th scope="col">Khóa Học</th>
            <th scope="col">Học Phí</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">
                    <div class="text-left">
                        {{-- <div class="col-12">
                            <a href="/admin/student/create/excel">
                                <button type="button" class="border-primary btn btn-outline-primary">Thêm File Excel</button>
                            </a>
                        </div> --}}
                        <div class="col-12 pt-1">
                            <a href="{{ route('student.create') }}">
                                <button type="button" class="border-primary btn btn-outline-primary">Thêm Học Viên</button>
                            </a>
                        </div>
                    </div>
            </th>
        </tr>
    </thead>
    <tbody>
        @if(count($get_all_student) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có kết Quả Tìm Kiếm Nào
                </div>
            </div>
        </td>
        @endif
        <?php $i = 1 ?>
        @foreach ($get_all_student as $student)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <td><img width="100px" src="storage/{{ $student->avatar }}" alt=""></td>
            <td>{{ $student->fullname }}</td>
            <td>{{ $student->code }}</td>
            <td>
                @foreach ($get_all_class as $class)
                @if($student->class_id == $class->id)
                @foreach ($get_all_course as $course)
                @if($class->course_id == $course->id)
                {{ $course->course_name }}
                @endif
                @endforeach
                @endif
            </td>
            <td>
            <input data-id="{{$student->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $student->fee_status ? 'checked' : '' }}>
            @endforeach
            
            </td>
            <td>
                <a id="btn_delete_{{ $student->id }}">
                <input type="checkbox"  @if($student->status == 1) checked @endif
                data-toggle="toggle" data-on="Hoạt Động"
                data-off="Bảo Lưu" data-onstyle="success" data-offstyle="danger"
                >
                </a>
                <form id="delete_form_{{ $student->id }}" action="{{ route('student.destroy',$student->id) }}" method="post" style="display: none;">
                    @method('DELETE')
                    @csrf
                <input type="hidden" name="status" value="{{ $student->status }}">
                </form>
            </td>
            <td>
                <a href="{{ route('student.show',"$student->id") }}">
                    <button type="button" class="border-info btn btn-outline-info">Chi Tiết</button>
                </a>
                {{-- <a href="{{ route('student.edit',"$student->id") }}">
                    <button type="button" class="border-warning btn btn-outline-warning">Sửa</button>
                </a> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="container justify-content-center d-flex mt-5 pb-5">
    {{$get_all_student->links()}}
</div>
@endsection

@push('scripts')
<script>
    $("a[id^='btn_delete_']").click(function(event) {
        id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
            $("#delete_form_" + id).submit();
    });
</script>
@endpush
<script>
  $(document).ready(function(){
    $('.toggle-class').change(function () {
        let fee_status = $(this).prop('checked') === true ? 1 : 0;
        let id = $(this).data('id');
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'admin/changeStatus',
            data: {'fee_status': fee_status, 'student_id': id},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
});
</script>