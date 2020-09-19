@extends('teacher.layout.master')
@section('title','Lịch dạy')
@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Danh sách lớp phụ trách</h4>
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Lớp</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>Chi Tiết</th>
                                <th>Danh sách học viên</th>
                                {{-- <th>Đã học</th> --}}
                            </tr>
                            </thead>


                            <tbody>
                            <?php $i=1 ?>
                            @foreach($classes as $class)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$class->name}}</td>
                                <td>{{$class->start_date}}</td>
                                <td>
                                    <a href="{{route('teacher.detailSchedule',$class->id)}}">Chi Tiết</a>
                                </td>
                                <td>
                                    <a href="{{route('teacher.classList',$class->id)}}">Xem</a>
                                </td>
                                {{-- <td>
                                    {{$pasts->count('time')}}
                                </td> --}}
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lịch dạy hôm nay</h4>
                        <table id="datatable_wrapper" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ngày</th>
                                <th>Lớp</th>
                                <th>Ca Học</th>
                                <th>Thời gian</th>
                            </tr>
                            </thead>


                            <tbody>
                                @if(count($schedules) == 0)
                                <td colspan="7">
                                    <div class="mt-5 col-12 justify-content-center d-flex">
                                        <div class=" alert alert-info" role="alert">
                                            Hôm nay không có lớp học
                                        </div>
                                    </div>
                                </td>
                                @endif
                            <?php $i=1 ?>
                            @foreach($schedules as $schedule)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    Thứ {{$schedule->weekday}} - {{date('d-m-Y', strtotime($schedule->time))}}
                                </td>
                                <td>{{$schedule->getClass->name}}</td>
                                <td>{{$schedule->slot}}</td>
                                <td>@if ($schedule->slot == 1) 7h15 - 9h15
                                    @elseif ($schedule->slot == 2) 9h30 - 11h30
                                    @elseif ($schedule->slot == 3) 13h30 - 15h30 
                                    @elseif ($schedule->slot == 4) 15h45 - 17h45
                                    @elseif ($schedule->slot == 5) 18h00 - 20h00
                                    @elseif ($schedule->slot == 6) 20h15 - 22h15
                                    @endif
                                </td>
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