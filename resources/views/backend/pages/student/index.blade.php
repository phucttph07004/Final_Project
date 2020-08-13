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
                    <a class="dropdown-item" href="/admin/student">Tất Cả</a>
                    <a class="dropdown-item" href="/admin/student?fee_status=1">Đã nộp Tiền</a>
                    <a class="dropdown-item" href="/admin/student?fee_status=0">Chưa nộp Tiền</a>
                    <a class="dropdown-item" href="/admin/student?status=1">Hoạt Động</a>
                    <a class="dropdown-item" href="/admin/student?status=0">Bảo Lưu</a>
                </div>
            </div>
        <div style="width: 300px;">
                <form class="form-inline pt-4">
                    <input name="code" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Theo mã Học Viên" aria-label="Search">
                    <a>
                        <button  class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </a>
                </form>
        </div>
    </div>
        </div>
</div>
</div>
<table style="background-color: white" class="table ml-5 col-12">
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
                                <button type="button" class="border-primary btn btn-outline-primary">Thêm Mới</button>
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
        @foreach ($get_all_student as $item)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <td><img width="100px" src="storage/{{ $item->avatar }}" alt=""></td>
            <td>{{ $item->fullname }}</td>
            <td>{{ $item->code }}</td>
            <td>
                @foreach ($get_all_class as $class)
                @if($item->class_id == $class->id)
                @foreach ($get_all_course as $course)
                @if($class->course_id == $course->id)
                {{ $course->course_name }}
                @endif
                @endforeach
                @endif
                @endforeach
            </td>
            <td>
                <a class="fee_status" id="btn_edit_fee_status_{{ $item->id }}">
                <input type="checkbox"  @if($item->fee_status == 1) checked @endif
                data-toggle="toggle" data-on="Đã nộp"
                data-off="Chưa nộp" data-onstyle="success" data-offstyle="danger"
                >
                </a>
                <form id="btn_edit_fee_status_form_{{ $item->id }}" action="{{ route('student.destroy',$item->id) }}" method="post" style="display: none;">
                    @method('DELETE')
                    @csrf
                <input type="hidden" name="fee_status" value="{{ $item->fee_status }}">
                </form>
            </td>

            <td>
                <a id="btn_edit_status_{{ $item->id }}">
                <input type="checkbox"  @if($item->status == 1) checked @endif
                data-toggle="toggle" data-on="Hoạt Động"
                data-off="Bảo Lưu" data-onstyle="success" data-offstyle="danger"
                >
                </a>
                <form id="btn_edit_status_form_{{ $item->id }}" action="{{ route('student.destroy',$item->id) }}" method="post" style="display: none;">
                    @method('DELETE')
                    @csrf
                <input type="hidden" name="status" value="{{ $item->status }}">
                </form>
            </td>

            <td>
                <a href="{{ route('student.show',"$item->id") }}">
                    <button type="button" class="border-info btn btn-outline-info">Chi Tiết</button>
                </a>
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

    $("a[id^='btn_edit_fee_status_']").click(function(event) {
        id = event.currentTarget.attributes.id.value.replace('btn_edit_fee_status_', '');
        if( confirm('Bạn có chắc chắn muốn thay đổi trạng thái học phí')){
            $("#btn_edit_fee_status_form_" + id).submit();
        }else{

        }
    });

    $("a[id^='btn_edit_status_']").click(function(event) {
        id = event.currentTarget.attributes.id.value.replace('btn_edit_status_', '');
        if( confirm('Bạn có chắc chắn muốn thay đổi trạng thái học viên')){
            $("#btn_edit_status_form_" + id).submit();
        }
    });

    // $(".fee_status").click( function() {
    //     alert('fff');
    //     // $(".address_two").addClass("block_address");
    //     // $(".address_one").removeClass("block_address");
    // });

</script>
@endpush
