@extends('./backend/layout/master')
@section('title','Quản Trị Tài Khoản')
@section('title_page','Quản Trị Tài Khoản')
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
            <th scope="col">Ảnh</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Chức vụ</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">
                <a href="{{ route('user.create') }}">
                    <button type="button" class="btn btn-outline-primary">Tạo tài khoản mới</button>
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <td><img style="width:70px;height:50px" src="storage/{{ $user->avatar }}" alt=""></td>
            <td>{{ $user->fullname }}</td>
            <td>
                @if($user->role == 6)<span>Tổng giám đốc</span>
                @elseif( $user->role == 5 ) <span>Giám đốc chi nhánh</span>
                @elseif( $user->role == 4 ) <span>Giáo viên</span>
                @elseif( $user->role == 3 ) <span>Trợ giảng</span>
                @elseif( $user->role == 2 ) <span>Admin</span>
                @endif
            </td>
            <td>
                @if($user->is_active == 1) <span style='color: green'>Hoạt động</span>
                @else <span style='color: red'>Khoá</span>
                @endif
            </td>
            <td>
                <a href="{{ route('user.show',"$user->id") }}">
                    <button type="button" class="btn btn-outline-info">Chi Tiết</button>
                </a>
                <a href="{{ route('user.edit',"$user->id") }}">
                    <button type="button" class="btn btn-outline-warning">Sửa</button>
                </a>

                <!-- <a id="btn_delete_{{ $user->id }}" class="btn btn-outline-danger">Xóa</a>
                <form id="delete_form_{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}"
                    method="post" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form> -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="container justify-content-center d-flex mt-5 pb-5">
    {{$users->links()}}
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