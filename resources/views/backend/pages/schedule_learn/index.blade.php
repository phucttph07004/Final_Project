@extends('./backend/layout/master')
@section('title','Quản Trị Lịch Học')
@section('title_page','Danh Sách Lớp Chưa Có Lịch')
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
                        <a class="dropdown-item" href="/admin/schedule_learn">Tất Cả</a>
                        <a class="dropdown-item" href="/admin/schedule_learn?status=0">Đã Đóng</a>
                        <a class="dropdown-item" href="/admin/schedule_learn?weekday=1">Đã Xếp</a>
                        <a class="dropdown-item" href="/admin/schedule_learn?weekday=0">Chưa Xếp</a>
                    </div>
                </div>
                <div style="width: 300px;">
                    <form class="form-inline pt-4">
                        <input name="name" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Theo Tên Lớp" aria-label="Search">
                        <a>
                            <button class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<table class="table ml-3">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Lớp</th>
            <th scope="col">Level</th>
            <th scope="col">Khóa Học</th>
            <th scope="col">Số Học Viên Trong Lớp</th>
            <th scope="col">Trạng Thái</th>
        </tr>
    </thead>
    <tbody>
        @if(count($get_all_class) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có kết Quả Tìm Kiếm Nào
                </div>
            </div>
        </td>
        @endif
        <?php $i = 1 ?>
        @foreach ($get_all_class as $item)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->levelName->level }}</td>
            <td>{{ $item->courseName->course_name }}</td>
            <td>{{ $item->count_class_count }}</td>
            <td>
                @if($item->status == 0)
                <p class="text-danger">Lớp Đã Đóng</p>
                @else
                @if($item->weekday == null)
                <p class="text-warning">Chưa Xếp Lịch</p>
                @else
                <p class="text-primary">Đã Xếp Lịch</p>
                @endif
                @endif
            </td>
            <td>
                @if($item->status == 0)
                <button type="button" class="border-danger btn btn-outline-danger">Đã Đóng</button>
                @else
                <button data-toggle="modal" data-target="#exampleModal_{{$item->id}}" type="button" class="border-info btn btn-outline-info">Xếp Lịch</button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


{{-- @foreach ($get_all_class as $item)
<?php
if($item->slot != null){
    $weekday['week']= explode (',',rtrim($item->weekday, ','));
    $slot['slot']= explode (',',rtrim($item->slot, ','));

    $done[$item->id]=array_merge($weekday,$slot);
}
?>
@endforeach --}}



@foreach ($get_all_class as $item)
<!-- Modal -->
<form id="btn_create_form_{{ $item->id }}" action="{{ route('schedule_learn.store') }}" method="post">
    @csrf
    <div class="modal fade" id="exampleModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header m-auto">
                    <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Xếp Lịch Học</h4>
                </div>
                <h4 class="error text-center text-danger"></h4>
                <div class="modal-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Lớp Đang Xếp</th>
                                <th scope="col">Lớp : {{$item->name}}</th>
                                @foreach ($get_all_level as $level)
                                @if($item->level_id == $level->id)
                                <th scope="col">Level : {{ $level->level }}</th>
                                @endif
                                @endforeach
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="mt-5">
                            <tr>
                                <th scope="row">Thứ 2</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="2" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 3h45 đến 5h45 )</option>
                                        <option value="5">Ca 5 ( 6h đến 8h )</option>
                                        <option value="6">Ca 6 ( 8h15 đến 10h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 3</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="3" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 3h45 đến 5h45 )</option>
                                        <option value="5">Ca 5 ( 6h đến 8h )</option>
                                        <option value="6">Ca 6 ( 8h15 đến 10h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 4</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="4" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 3h45 đến 5h45 )</option>
                                        <option value="5">Ca 5 ( 6h đến 8h )</option>
                                        <option value="6">Ca 6 ( 8h15 đến 10h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 5</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="5" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 3h45 đến 5h45 )</option>
                                        <option value="5">Ca 5 ( 6h đến 8h )</option>
                                        <option value="6">Ca 6 ( 8h15 đến 10h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 6</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="6" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 3h45 đến 5h45 )</option>
                                        <option value="5">Ca 5 ( 6h đến 8h )</option>
                                        <option value="6">Ca 6 ( 8h15 đến 10h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 7</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="7" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 3h45 đến 5h45 )</option>
                                        <option value="5">Ca 5 ( 6h đến 8h )</option>
                                        <option value="6">Ca 6 ( 8h15 đến 10h15 )</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <a id="btn_create_{{ $item->id }}">
                        <button type="button" class="btn btn-primary">Lưu Lịch Học</button>
                    </a>
                    <input name="class_id" type="hidden" value="{{ $item->id }}">
                    @foreach ($get_all_level as $level)
                    @if($item->level_id == $level->id)
                    <input name="level_id" type="hidden" value=" {{ $level->level }}">
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</form>
@endforeach



@endsection
@push('scripts')
<script>

    $("a[id^='btn_create_']").click(function(event) {
        id = event.currentTarget.attributes.id.value.replace('btn_create_', '');
var count=0;
$("select option:selected").each(function ()
{
    if($(this).val() != 0){
        count++;
    }
});
if(count >=2){
    if (confirm('Xác Nhận Lịch Học')) {
            $("#btn_create_form_" + id).submit();
        }
}else{
    $( ".error" ).html("Vui Lòng Chọn ca Cho ít Nhất 2 Ngày Trong Tuần");
}
    });
</script>
@endpush
