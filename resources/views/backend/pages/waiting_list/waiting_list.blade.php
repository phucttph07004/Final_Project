@extends('./backend/layout/master')
@section('title','Quản Trị Danh Sách Chờ')
@section('title_page','Quản Trị Danh Sách Chờ')
@section('content')
<section class="content">
    <table style="background-color: white" class="table ml-5">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
        <div class="d-flex align-items-center ml-5">
            <div class="col-5">
                <form action="">
                    <input class="form-control" type="text" name="fullname" value="" placeholder="Lọc theo tên">
                </form>
            </div>
        </div>
        <thead>
            <tr>
                <th class="pl-3" scope="col">STT</th>
                <th scope="col">Họ Tên</th>
                <th scope="col">Ngày Sinh</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Level</th>
                <th scope="col">Ca</th>
                <th scope="col">Địa Chỉ</th>
                <th scope="col">Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
        @if(count($waiting_list) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có kết Quả  Nào
                </div>
            </div>
        </td>
        @endif
            <?php $i=1 ?>
            @foreach ($waiting_list as $item)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $item->fullname }}</td>
                <td>{{ $item->date_of_birth }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->level_id}}</td>
                <td>{{ $item->slot }}</td>
                <td>{{ $item->address }}</td>
                <td>  
                    <a class="toggle-class" id="btn_deactive_{{ $item->id }}">
                    <input type="checkbox" @if($item->status == 1) checked @endif
                    data-toggle="toggle" data-on="Done"
                    data-off="Huỷ" data-onstyle="success" data-offstyle="danger"
                    ></a>
                    <form id="deactive_form_{{ $item->id }}" action="{{ route('waiting-list.destroy',$item->id) }}"
                        method="post" style="display: none;">
                        @method('DELETE')
                        <input type="hidden" name="status" value="{{$item->status}}">
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
        {{$waiting_list->links()}}
    </div>
</section>
@endsection

@push('scripts')
<script>
    $("a[id^='btn_deactive_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_deactive_', '');
    $("#deactive_form_" + id).submit();
});
</script>
@endpush