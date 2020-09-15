@extends('./backend/layout/master')
@section('title','Quản Trị Chi Nhánh')
@section('title_page','Quản Trị Chi Nhánh')
@section('content')


<table class="bg-white col-11 table ml-5">
    @if(session('thongbao'))
    <div class="alert alert-primary text-center" role="alert">
        {{session('thongbao') }}
    </div>
    @endif
    <thead>
        <tr>
            <th scope="col">Khóa</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 ?>
        
        <tr>

            <td>{{ $course->course_name}}</td>
            <td></td>
            <td>
                <a href="{{ route('attendance.show',"$course->id") }}">
                    <button type="button" class="border-info btn btn-outline-info">Chi tiết</button>
                </a>
            </td>
        </tr>
    </tbody>
</table>
<div class="container justify-content-center d-flex mt-5 pb-5">
    
</div>
@endsection
