@extends('student.layout.master')
@section('title','Điểm danh')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Điểm danh</h4>
                            <p style="font-size:18px" >Đã vắng: {{$status->count('student_id')}}/24</p>
                        </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ngày</th>
                                <th>Lớp</th>
                                <th>Ca Học</th>
                                <th>Trạng thái</th>
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

                                    <td @if(array_search(Auth::guard('student')->user()->id,explode(',', $schedule->student_id)) === false) style="color:red;" @else style="color:green" @endif>
                                        
                                        @if($schedule->time > now())
                                
                                        @elseif(array_search(Auth::guard('student')->user()->id,explode(',', $schedule->student_id)) === false)
                                            Vắng mặt
                                        @else
                                            Có mặt
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