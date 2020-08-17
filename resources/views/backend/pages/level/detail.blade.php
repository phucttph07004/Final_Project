@extends('./backend/layout/master')
@section('title','Chi tiết khoá học')
@section('title_page','Danh sách lớp học theo level')
@section('content')

<section class="content">
    <!-- <div class="ml-5 dropdown pt-3 pb-4 mt-2">
        <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lọc Theo Khoá
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($courses as $course)
            <a class="dropdown-item"
                href="{{route('level.index')}}/{{$level->id}}?course_id={{ $course->id }}">{{ $course->course_name }}</a>
            @endforeach
        </div>
        <form action="">
            <select id='suppiler' name='course_id'>
                <option value=''>Select supplier</option>
                @foreach ($courses as $course)
                <option value='{{$course->id}}'>
                    {{ $course->course_name }}</option>
                @endforeach
            </select>
            <button>submit</button>
        </form>
    </div> -->

    <form class="ml-5 d-flex align-items-center" action="">
        <div class="col-6">
        <input class="form-control" type="text" name="name" placeholder="Tìm kiếm theo tên lớp">
        </div>
        <button type="submit" class="btn btn-outline-info mr-4">Tìm</button>
        <!-- <a href="{{route('course.index')}}" class="btn btn-outline-success">Bỏ lọc</a> -->
    </form>

    <h3 class="ml-5">Danh sách lớp học level {{$level->level}}</h3>
    <table style="background-color: white" class="table ml-5">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên lớp</th>
                <th scope="col">Level</th>
                <th scope="col">Khoá</th>
                <!-- <th scope='col'>Số buổi học</th> -->
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
                        Tên lớp không đúng hoặc khoá học hiện tại chưa có lớp
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
                <!-- <td>{{ $class->number_of_sessions}}</td> -->
                <td>
                    <input data-id="{{$class->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                        data-offstyle="danger" data-toggle="toggle" data-on="Mở" data-off="Đóng"
                        {{ $class->status ? 'checked' : '' }}>
                </td>
                <td>
                    <a class="btn btn-outline-info" href="{{ route('class.show',"$class->id") }}"> Chi Tiết
                    </a>
                    <a class="btn btn-outline-warning" href="{{ route('class.edit',"$class->id") }}">Sửa</a>

                    <!-- @if($class->status == 1)
                    <button id="btn_deactive_{{ $class->id }}" class="btn btn-outline-danger">Đóng</button>
                    @else
                    <button id="btn_deactive_{{ $class->id }}" class="btn btn-outline-success">Mở</button>
                    @endif

                    <form id="deactive_form_{{ $class->id }}" action="{{ route('class.destroy',$class->id) }}"
                        method="post" style="display: none;">
                        @method('DELETE')
                        <input type="hidden" name="is_active" value="{{$class->is_active}}">
                        @csrf
                    </form> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
    </div>
</section>
@endsection

@push('scripts')
<script>
</script>
@endpush