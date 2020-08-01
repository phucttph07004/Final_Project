@extends('./backend/layout/master')
@section('title','Quản Trị Chi Nhánh')
@section('title_page','Quản Trị Chi Nhánh')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="row navbar-light bg-light mt-4">
            <div class="col-5"></div>
            <div class="col-2 ml-5">
                <div class="dropdown mt-2">
                    <button class="border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lọc Theo Trạng Thái
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/branch?status=1">Đang Hoạt Động</a>
                        <a class="dropdown-item" href="/branch?status=2">Đang Tạm Dừng</a>
                    </div>
                </div>
            </div>
            <div class="col-4 ml-2">
                <nav class="navbar">
                    <form class="form-inline">
                        <input name="branch_name" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Theo Tên Chi Nhánh" aria-label="Search">
                        <a>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </a>
                    </form>
                </nav>
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
                    <button type="button" class="btn btn-outline-primary">Thêm Chi Nhánh</button>
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        @if(count($get_all_branch) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có kết Quả Tìm Kiếm Nào
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
                <p class="text-primary">Đang Hoạt Động</p>
                @else
                <p class="text-warning">Đang Tạm Dừng</p>
                @endif
            </td>
            <td>
                <a href="{{ route('branch.show',"$item->id") }}">
                    <button type="button" class="btn btn-outline-info">Chi Tiết</button>
                </a>
                <a href="{{ route('branch.edit',"$item->id") }}">
                    <button type="button" class="btn btn-outline-warning">Sửa</button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="container justify-content-center d-flex mt-5 pb-5">
    {{$get_all_branch->links()}}
</div>
@endsection
