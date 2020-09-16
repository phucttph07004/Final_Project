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
                            Đã vắng
                            <?php
                            $count = count($pasts);
                            $check=0;
                            ?>
                        @foreach($schedule as $key => $value)
                        @if($value == Auth::guard('student')->user()->id)
                           <?php
                            $check++;
                           ?>
                        @endif
                        @endforeach
                        {{ substr($count - $check,-1).' / '.$count}}
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
                                    {{-- Check Absent  --}}
                                    @if($schedule->time > now())
                                        <td>

                                        </td>
                                    @elseif(array_search(Auth::guard('student')->user()->id,explode(',', $schedule->student_id)) === false)
                                        <td class="absent" style="color:red;" >Vắng mặt</td>
                                    @else
                                        <td style="color:green" >Có mặt</td>
                                    @endif 
                                    {{-- End Check Absent  --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="container justify-content-center d-flex mt-5 pb-5">
                            {{$schedules->links()}}
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // var colCount = $("#datatable-buttons tr .absent").length;
    // document.querySelector(".absent-count").innerHTML = colCount;
</script>
@endpush