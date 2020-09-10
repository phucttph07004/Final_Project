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
        <div class="d-flex flex-wrap align-items-center ml-5 pt-4">
           <div class="col-4">
            <form action="">
                <input class="form-control border-success" type="text" name="name" value="" placeholder="Tìm theo tên lớp">
            </form>
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
                   <a class="btn btn-outline-primary border-primary" href="{{route('attendance.show',$class->id)}}">Lịch học</a>
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