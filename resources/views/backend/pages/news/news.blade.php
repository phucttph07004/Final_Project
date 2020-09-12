@extends('./backend/layout/master')
@section('title','Quản Trị Tin Tức')
@section('title_page','Quản Trị Tin Tức')
@section('content')
<section class="content" style="margin:0!important;">
    <table style="background-color: white" class="table table-striped table-bordered dt-responsive nowrap ">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
        <thead>
            <tr>
                <th style="width: 10px">ID</th>
                <th>Ảnh</th>
                <th>Tiêu đề</th>
                <th>Danh mục</th>
                <th>Lượt xem</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th><a class="btn btn-outline-success" href="{{route('news.create')}}">Thêm tin tức</a></th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
            @foreach($news as $new)
            <tr>
                <td>{{ $i++ }}</td>
                <td><img src="storage/{{ $new->image }}" width="70px" height="50px"></td>
                <td>{{$new->title}}</td>
                <td>{{$new->categoryName->name}}</td>
                <td>{{$new->view}}</td>
                <td>
                    @if($new->status == 1)
                    <span class="text-success">Hiện</span>
                    @else
                    <span class="text-danger">Ẩn</span>
                    @endif
                </td>
                <td>{{$new->created_at->format('d-m-Y')}}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{route('news.edit',[$new->id])}}">Sửa</a>

                    @if($new->status == 1)
                    <button id="btn_delete_{{ $new->id }}" class="btn btn-outline-danger">Ẩn</button>
                    @else
                    <button id="btn_delete_{{ $new->id }}" class="btn btn-outline-success">Hiện</button>
                    @endif

                    <form id="delete_form_{{ $new->id }}" action="{{ route('news.destroy',$new->id) }}" method="post"
                        style="display: none;">
                        @method('DELETE')
                        <input type="hidden" name="status" value="{{$new->status}}">
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
        {{$news->links()}}
    </div>
</section>
@endsection

@push('scripts')
<script>
$("button[id^='btn_delete_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
    $("#delete_form_" + id).submit();
});
$('.close-noti').click(function() {
    $('.alert-noti').hide();
});
</script>
@endpush