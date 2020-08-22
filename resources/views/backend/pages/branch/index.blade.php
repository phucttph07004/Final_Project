@extends('./backend/layout/master')
@section('title','Quản Trị Chi Nhánh')
@section('title_page','Quản Trị Chi Nhánh')
@section('content')


<div class="col-12">
        <div style="padding-left: 160px" class="row bg-light form-inline">
            <div class="col-5"></div>
            <div class="col-7">
                <div class="row pl-5">
                <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                    <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lọc Theo Trạng Thái
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/admin/branch">Tất Cả</a>
                        <a class="dropdown-item" href="/admin/branch?status=1">Đang Hoạt Động</a>
                        <a class="dropdown-item" href="/admin/branch?status=2">Đang Tạm Dừng</a>
                    </div>
                </div>
            <div style="width: 300px;">
                    <form class="form-inline pt-4">
                        <input name="branch_name" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Theo Tên Chi Nhánh" aria-label="Search">
                        <a>
                            <button class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </a>
                    </form>
            </div>
        </div>
            </div>
    </div>
</div>
<table class="bg-white col-11 table ml-5">
    @if(session('thongbao'))
    <div class="alert alert-primary text-center" role="alert">
        {{session('thongbao') }}
    </div>
    @endif
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Tên Chi Nhánh</th>
            <th scope="col">Giám Đốc</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">
                <a href="{{ route('branch.create') }}">
                    <button class="border-primary btn btn-outline-primary">Thêm Chi Nhánh</button>
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        @if(count($get_all_branch) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có kết Quả  Nào
                </div>
            </div>
        </td>
        @endif
        <?php $i = 1 ?>
        @foreach ($get_all_branch as $item)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $item->address }}</td>
            <td>{{ $item->branch_name }}</td>
            <td>{{ $item->directorName->fullname }}</td>
            <td>
                @if($item->status == 1)
                <p class="text-primary">Hoạt Động</p>
                @else
                <p class="text-warning">Tạm Dừng</p>
                @endif
            </td>
            <td>
                <a href="{{ route('branch.show',"$item->id") }}">
                    <button type="button" class="border-info btn btn-outline-info">Chi Tiết</button>
                </a>
                <a href="{{ route('branch.edit',"$item->id") }}">
                    <button type="button" class="border-warning btn btn-outline-warning">Sửa</button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="container justify-content-center d-flex mt-5 pb-5">
    {{ $get_all_branch->links() }}
</div>
@endsection
