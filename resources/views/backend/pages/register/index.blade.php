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
                                        <a class="dropdown-item" href="/admin/register">Tất Cả</a>
                                        <a class="dropdown-item" href="/admin/register?is_active=1">Đã xác nhận</a>
                                        <a class="dropdown-item" href="/admin/register?is_active=0">Chưa xác nhận</a>
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
                                    <th>Level</th>
                                    <th>Ghi chú</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($get_all_register) == 0)
                                    <td colspan="10">
                                        <div class="mt-5 col-12 justify-content-center d-flex">
                                            <div class=" alert alert-danger" role="alert">
                                                Không Có kết Quả Tìm Kiếm Nào
                                            </div>
                                        </div>
                                    </td>
                                @endif
                                <?php $i = 1 ?>
                                @foreach($get_all_register as $item)
                                <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ $item->date_of_birth }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->level }}</td>
                                <td>{{ $item->note }}</td>
                                <td>
                                    @if($item->is_active == 1)
                                    <p class="text-primary">Đã xác nhận</p>
                                    @else
                                    <p class="text-warning">Chưa xác nhận</p>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('register.edit',"$item->id") }}">
                                        <button type="button" class="border-warning btn btn-outline-warning">Sửa</button>
                                    </a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('scripts')
<script>
$('.close-noti').click(function() {
    $('.alert-noti').hide();
})
</script>
@endpush    