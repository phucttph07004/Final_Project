@extends('./backend/layout/master')
@section('title','Quản Trị Lịch Dậy')
@section('title_page','Xếp Lịch Dạy Cho Giảng viên')
@section('content')
<div class="col-12">
    <div style="padding-left: 45px" class="row bg-light form-inline">
        <div class="col-5"></div>
        <div class="col-7">
            <div class="row pl-5">
                <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                    <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lọc Theo Trạng Thái
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/admin/schedule_learn">Tất Cả</a>
                        <a class="dropdown-item" href="/admin/schedule_learn?status=0">Đã Đóng</a>
                        <a class="dropdown-item" href="/admin/schedule_learn?weekday=1">Đã Xếp</a>
                        <a class="dropdown-item" href="/admin/schedule_learn?weekday=0">Chưa Xếp</a>
                    </div>
                </div>
                <div style="width: 300px;">
                    <form class="form-inline pt-4">
                        <input name="name" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Theo Tên Lớp" aria-label="Search">
                        <a>
                            <button class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table ml-5">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Lớp</th>
            <th scope="col">Level</th>
            <th scope="col">Số Học Viên Trong Lớp</th>
            <th scope="col">Giảng Viên Được Phân Công</th>
        </tr>
    </thead>
    <tbody>
        @if(count($get_all_class) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có kết Quả Tìm Kiếm Nào
                </div>
            </div>
        </td>
        @endif
        <?php $i = 1 ?>

        @foreach ($get_all_class as $item)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->levelName->level }}</td>
            <td>{{ $item->count_studen_count }}</td>
            <td>


                @foreach($get_all_user as $user)
                @if($item->teacher_id == $user->id )
                <p class="text-primary">{{ $user->fullname }}</p>
                <?php break; ?>
                @else
                <p class="text-warning">Chưa Có Giảng Viên</p>
                <?php break; ?>
                @endif
                @endforeach

            </td>
            <td>
                @foreach($get_all_user as $user)
                @if($item->teacher_id == $user->id )
                {{-- <p class="text-primary">{{ $user->fullname }}</p> --}}
                @if($item->count_studen_count == 0)
                <button type="button" class="border-warning btn btn-outline-warning">Sửa Giảng Viên</button>
                @else
                <button type="button" class="border-primary btn btn-outline-primary">Xem Chi Tiết</button>
                @endif
                <?php break; ?>
                @else
                <button type="button" class="border-primary btn btn-outline-primary">Xếp Giảng Viên</button>
                <?php break; ?>
                @endif
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


{{-- <div class="container justify-content-center d-flex mt-5 pb-5">
    @if($check == false)
    {{$get_all_class->links()}}
    @endif
</div> --}}
@endsection
@push('scripts')
<script>

</script>
@endpush
