@extends('teacher.layout.master')
@section('title','Lịch dạy')
@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách học viên lớp {{$class->name}}</h4>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Mã Học Viên</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach($students as $student)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$student->fullname}}</td>
                                <td>{{$student->code}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->email}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
@endsection