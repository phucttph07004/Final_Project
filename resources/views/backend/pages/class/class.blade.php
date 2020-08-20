@extends('./backend/layout/master')
@section('title','Quản Trị Lớp Học')
@section('title_page','Quản Trị Lớp Học')
@section('content')
<section class="content">

    <table style="background-color: white" class="table ml-5">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
        <div class="d-flex align-items-center ml-5">
            <form action="">
                <input type="text" name="name" value="" placeholder="Lọc theo tên">
            </form>
            <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc Theo Level
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('class.index')}}">Tất cả</a>
                    @foreach ($levels as $level)
                    <a class="dropdown-item"
                        href="{{route('class.index')}}?level_id={{ $level->id }}">{{ $level->level }}</a>
                    @endforeach
                </div>
            </div>
            <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc Theo Khoá
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('class.index')}}">Tất cả</a>
                    @foreach ($courses as $course)
                    <a class="dropdown-item"
                        href="{{route('class.index')}}?course_id={{ $course->id }}">{{ $course->course_name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc Theo Trạng Thái
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('class.index')}}">Tất cả</a>
                    <a class="dropdown-item" href="{{route('class.index')}}?status=0">Đóng</a>
                    <a class="dropdown-item" href="{{route('class.index')}}?status=1">Mở</a>
                </div>
            </div>
        </div>
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên lớp</th>
                <th scope="col">Level</th>
                <th scope="col">Khoá</th>
                <th scope="col">Ngày bắt đầu</th>
                <th scope="col">Ngày Kết thúc</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">
                    <a href="{{ route('class.create') }}">
                        <button type="button" class="btn btn-outline-primary">Tạo lớp mới</button>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($classes) == 0)
            <td colspan="7">
                <div class="mt-5 col-12 justify-content-center d-flex">
                    <div class=" alert alert-danger" role="alert">
                        Không có lớp học trong level hoặc khoá học này
                    </div>
                </div>
            </td>
            @endif
            <?php $i=1 ?>
            @foreach ($classes as $class)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $class->name }}</td>
                <td>{{ $class->levelName->level}}</td>
                <td>{{ $class->courseName->course_name}}</td>
                <td>{{date('d-m-Y', strtotime($class->start_date))}}</td>
                <td>{{date('d-m-Y', strtotime($class->finish_date))}}</td>
                <td>
                    <!-- <input data-id="{{$class->id}}" id="btn_deactive_{{ $class->id }}" class="toggle-class" type="checkbox" data-onstyle="success"
                        data-offstyle="danger" data-toggle="toggle" data-on="Mở" data-off="Đóng"
                        {{ $class->status ? 'checked' : '' }}> -->
                    <a class="toggle-class" id="btn_deactive_{{ $class->id }}">
                        <input type="checkbox" @if($class->status == 1) checked @endif
                        data-toggle="toggle" data-on="Mở "
                        data-off="Đóng" data-onstyle="success" data-offstyle="danger"
                        >
                    </a>
                </td>
                <td>
                    <a class="btn btn-outline-info" href="{{ route('class.show',"$class->id") }}"> Chi Tiết
                    </a>
                    <a data-start="{{$class->start_date}}" class="btn btn-outline-warning edit-class"
                        href="{{route('class.edit',"$class->id")}}">Sửa</a>

                    <!-- @if($class->status == 1)
                    <button id="btn_deactive_{{ $class->id }}" class="btn btn-outline-danger">Đóng</button>
                    @else
                    <button id="btn_deactive_{{ $class->id }}" class="btn btn-outline-success">Mở</button>
                    @endif -->

                    <form id="deactive_form_{{ $class->id }}" action="{{ route('class.destroy',$class->id) }}"
                        method="post" style="display: none;">
                        @method('DELETE')
                        <input type="hidden" name="status" value="{{$class->status}}">
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
        {{$classes->links()}}
    </div>
</section>
@endsection

@push('scripts')
<script>
$("a[id^='btn_deactive_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_deactive_', '');
    $("#deactive_form_" + id).submit();
});
</script>
@endpush