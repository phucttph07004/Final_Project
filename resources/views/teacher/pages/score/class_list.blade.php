@extends('teacher.layout.master')
@section('title','Danh sách học viên')
@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('thongbao'))
                        <div class="alert alert-primary text-center" role="alert">
                            {{session('thongbao') }}
                        </div>
                        @endif
                        <h4 class="card-title">Danh sách học viên lớp {{$class->name}}</h4>
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Mã Học Viên</th>
                                <th>Điểm</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach($students as $student)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$student->fullname}}</td>
                                <td>{{$student->code}}</td>
                                <td>
                                    @foreach($scores as $score)
                                        @if($student->id == $score->student_id)
                                            {{$score->score}}
                                        @else
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($scores as $score)
                                        @if($student->id == $score->student_id)
                                           @if($score->status == 0) <span class="text-danger">Chưa hoàn thành</span>
                                           @else <span class="text-success">Hoàn thành</span>
                                           @endif
                                        @else
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if(array_search($student->id, $history) === false)
                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal_{{$student->id}}">Nhập điểm</a>
                                    @else
                                        
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
    {{-- Modal --}}
    @foreach($students as $student)
    <form id="score_submit{{$student->id}}"action="{{route('score.store')}}" method="post">
        @csrf
        <div class="modal fade bs-example-modal-center" id="modal_{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title mt-0">Nhập điểm cho học viên <b style="color:blue">{{$student->fullname}}</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="error abc"></h5>
                        <input type="text" placeholder="Nhập điểm" id="student_score_{{$student->id}}" name="score" class="form-control mb-2">
                        <input type="hidden" name="student_id" value="{{$student->id}}">
                        <input type="hidden" name="class_id" value="{{$class->id}}">
                        <input type="hidden" name="level_id" value="{{$class->level_id}}">
                        <input type="hidden" name="course_id" value="{{$class->course_id}}">
                            <button id="btn_create_{{$student->id}}" type="submit" class="btn btn-primary">Nhập điểm</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </form>
    @endforeach
@endsection

@push('scripts')
    <script>
            // $("a[id^='btn_create_']").click(function(event) {
            // id = event.currentTarget.attributes.id.value.replace('btn_create_', '');
            // var score = $('#student_score_{{$student->id}}').val();
            // var error = document.querySelector('.abc');

            // if(score == 0 ){
            //     error.innerHTML = "Không để trống điểm";
            // }
            // document.querySelector('.abc').innerHTML = "Không để trống điểm";
            // else {
            //     $(".error").html("Vui Lòng Chọn ca Cho ít Nhất 2 Ngày Trong Tuần");
            // }
        });
    </script>
@endpush