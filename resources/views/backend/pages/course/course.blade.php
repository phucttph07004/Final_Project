@extends('./backend/layout/master')
@section('title','Quản Lý Khoá Học')
@section('title_page','Quản Lý Khoá Học')
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
            <th scope="col">Khoá</th>
            <th scope="col">Ngày Khai Giảng</th>
            <th scope="col">Dự kiến kết thúc</th>
            <th scope="col">Người tạo</th>
            <th scope="col">
                <a href="{{ route('course.create') }}">
                    <button type="button" class="btn btn-outline-primary">Tạo khoá học mới</button>
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach ($courses as $course)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $course->course_name }}</td>
            <td>{{date('d-m-Y', strtotime($course->start_date))}}</td>
            <td>{{date('d-m-Y', strtotime($course->finish_date))}}</td>
            <td>{{$course->userName->fullname}}</td>
            <td>
                <a href="{{ route('course.edit',"$course->id") }}">
                    <button type="button" class="btn btn-outline-warning">Sửa</button>
                </a>
                <a id="btn_delete_{{ $course->id }}" class="btn btn-outline-danger">Xóa</a>
                <form id="delete_form_{{ $course->id }}" action="{{ route('course.destroy',$course->id) }}"
                    method="post" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="container justify-content-center d-flex mt-5 pb-5">
    {{$courses->links()}}
</div>
</section>
@endsection

@push('scripts')
<script>
$("a[id^='btn_delete_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
    if (confirm('Bạn có muốn xóa không')) {
        $("#delete_form_" + id).submit();
    }
});
</script>
@endpush