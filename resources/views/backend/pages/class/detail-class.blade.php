@extends('./backend/layout/master')
@section('title','Quản Trị Lớp Học')
@section('title_page','Chi tiết Lớp Học')
@section('content')
<form role="form" method="POST" action="{{ route('class.update', $class->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body d-flex flex-wrap">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên lớp</label>
                <input type="text" readonly="readonly" class="form-control" name="name" id=""
                    value="{{ $class->name }}">
                {!! ShowErrors($errors,'name') !!}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Level</label>
                <input type="text" readonly="readonly" class="form-control" name="level_id" id=""
                    value="{{ $class->level_id }}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Khoá</label>
                <input type="text" readonly="readonly" class="form-control" name="course_id" id=""
                    value="{{ $class->courseName->course_name }}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Trạng thái</label>
                <input type="text" readonly="readonly" class="form-control" name="is_active" id="" @if($class->is_active
                ==
                0) value="Khoá"
                @else value="Hoạt động"
                @endif

                >
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Người tạo</label>
                <input type="text" readonly="readonly" class="form-control" name="user_id" id=""
                    value="{{$class->userName->fullname}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Giáo viên</label>
                <input type="text" readonly="readonly" class="form-control" name="teacher_id" id=""
                    value="{{$class->teacher_id}}">
            </div>
        </div>
    </div>

    <table style="background-color: white" class="table ml-5">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Mã học viên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#student"
                        data-whatever="@mdo">Thêm học viên</button>
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($students) == 0)
            <td colspan="7">
                <div class="mt-5 col-12 justify-content-center d-flex">
                    <div class=" alert alert-danger" role="alert">
                        Không Có Học Viên Nào
                    </div>
                </div>
            </td>
            @endif
            <?php $i=1 ?>
            @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $student->fullname }}</td>
                <td>{{ $student->code}}</td>
                <td>{{ $student->phone}}</td>
                <td>{{ $student->email}}</td>
                <td>
                    @if($student->is_active == 0) <span>Khoá</span>
                    @else <span>Hoạt động</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal Add Student -->
    <div class="modal fade" id="student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form role="form" method="POST" action="{{ route('student.update', $class->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <label for="">Danh sách học viên</label>
                            <select class="form-control" name="" id="">
                               @foreach ($allstudents as $allstudent)
                                    <option value="">{{$allstudent->fullname}}</option>
                               @endforeach
                            </select>
                            <input type="hidden" name="class_id" value="$class->id">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal -->

    <div class="card-footer">
        <a href="{{route('class.index')}}" class="btn btn-danger">Quay lại</a>
    </div>

    </section>
    @endsection

    @push('scripts')
<script>
$('#student').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
})
</script>
@endpush