@extends('student.layout.master')
@section('title','Lịch học')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Lịch Học</h4>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ngày</th>
                                <th>Lớp</th>
                                <th>Ca Học</th>
                                <th>Thời gian</th>
                                <th>Giảng viên</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach ($schedules as $schedule)
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
                                        @elseif ($schedule->slot == 5) 9h30 - 11h30
                                        @elseif ($schedule->slot == 6) 9h30 - 11h30
                                        @endif
                                    </td>
                                    <td>
                                        
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