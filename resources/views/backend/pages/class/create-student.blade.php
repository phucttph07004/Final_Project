@extends('./backend/layout/master')
@section('title','Quản Trị Lớp Học')
@section('title_page','Thêm Học Viên')
@section('content')
<section class="content">

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
                    <a href="{{route('class-detail.create')}}" class="btn btn-primary">Thêm học viên</a>
                    <!-- <a href="{{route('class-detail.create')}}" class="btn btn-primary" data-toggle="modal" data-target="#student"
                        data-whatever="@mdo">Thêm học viên
                </a> -->
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $student->fullname }}</td>
                <td>{{ $student->code}}</td>
                <td>{{ $student->phone}}</td>
                <td>{{ $student->email}}</td>
                <td>
                    @if($student->status == 0) <span>Khoá</span>
                    @else <span>Hoạt động</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection

@push('scripts')
<script>
$("button[id^='btn_deactive_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_deactive_', '');
    $("#deactive_form_" + id).submit();
});
</script>
@endpush