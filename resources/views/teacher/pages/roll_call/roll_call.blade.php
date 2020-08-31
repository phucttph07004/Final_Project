@extends('teacher.layout.master')
@section('title','Điểm danh')
@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Điểm danh lớp {{$class->name}}</h4> 
                        <p>Ngày : {{$schedule->time}}</p>
                            <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Ảnh</th>
                                    <th>Mã Học Viên</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$student->fullname}}</td>
                                        <td>
                                            <img style="width:130px;" src="/storage/{{$student->avatar}}" alt="">
                                        </td>
                                    <td>{{$student->code}}</td>
                                    <td>
                                        {{-- <input @if(array_search($student->id,explode(',', $schedule->student_id)) === false) @else checked @endif type="checkbox" class="student_status" value="{{$student->id}}" name="student_id" data-student="{{$student->id}}" id="attendence_status_{{$student->id}}">
                                        <label for="attendence_status_{{$student->id}}">Có mặt</label> --}}
                                        <input @if(array_search($student->id,explode(',', $schedule->student_id)) === true)  @else checked @endif type="radio" class="present" value="{{$student->id}}" name="student_id__{{$student->id}}" data-student="{{$student->id}}" id="attendence_status_{{$student->id}}">
                                        <input @if(array_search($student->id,explode(',', $schedule->student_id)) === false) checked  @else  @endif type="radio" class="absent"  value="{{$student->id}}" name="student_id__{{$student->id}}"  id="attendence_status_{{$student->id}}">
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form action="{{route('roll-call.update',$schedule->id) }}" method="POST" class="button-items">
                                @method('PUT')
                                 @csrf
                                 <input type="text" name="student_id" value="{{$schedule->student_id}}" class="student_id" id="student_id">
                                <button style="margin:0 auto; display: block;" class="btn btn-primary waves-effect waves-light" type="submit">Xác nhận</button>
                            </form>
                        </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
@endsection

