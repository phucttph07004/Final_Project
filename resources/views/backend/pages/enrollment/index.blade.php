@extends('backend.layout.master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3 >Danh sách đăng ký thi đầu vào</h3>
                                <div class="row pl-5">
                                <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                                    <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Lọc Theo Trạng Thái
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/admin/enrollment">Tất Cả</a>
                                        <a class="dropdown-item" href="/admin/enrollment?status=1">Đã xác nhận</a>
                                        <a class="dropdown-item" href="/admin/enrollment?status=0">Chưa xác nhận</a>
                                    </div>
                                </div>
                            <div style="width: 300px;">
                                    <form class="form-inline pt-4">
                                        <input name="fullname" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Theo Tên Học Viên" aria-label="Search">
                                        <a>
                                            <button class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                        </a>
                                    </form>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            @if(session('thongbao'))
                            <div class="alert alert-primary text-center" role="alert">
                                {{session('thongbao') }}
                            </div>
                            @endif
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Ca học</th>
                                    <th>Level</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($get_all_enrollment) == 0)
                                    <td colspan="10">
                                        <div class="mt-5 col-12 justify-content-center d-flex">
                                            <div class=" alert alert-danger" role="alert">
                                                Không Có kết Quả Tìm Kiếm Nào
                                            </div>
                                        </div>
                                    </td>
                                @endif
                                <?php $i = 1 ?>
                                @foreach($get_all_enrollment as $item)
                                <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ $item->date_of_birth }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->slot }}</td>
                                <td>{{ $item->level_id }}</td>
                                <td>
                                    <a class="fee_status" id="btn_edit_status_{{ $item->id }}">
                                        <input type="checkbox" @if($item->status == 1) checked @endif
                                        data-toggle="toggle" data-on="Đã xác nhận"
                                        data-off="Chưa xác nhận" data-onstyle="success" data-offstyle="danger"
                                        >
                                    </a>
                                    <form id="btn_edit_status_form_{{ $item->id }}" action="{{ route('enrollment.destroy',$item->id) }}" method="post" style="display: none;">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="status" value="{{ $item->status }}">
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="container justify-content-center d-flex mt-5 pb-5">
                            {{$get_all_enrollment->links()}}
                        </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('scripts')
<script>
    $("a[id^='btn_edit_status_']").click(function(event) {
        id = event.currentTarget.attributes.id.value.replace('btn_edit_status_', '');
        if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái?')) {
            $("#btn_edit_status_form_" + id).submit();
        }
    });
</script>
@endpush 