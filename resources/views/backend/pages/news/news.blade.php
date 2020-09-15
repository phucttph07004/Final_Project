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
                    <a class="toggle-class" id="btn_deactive_{{ $new->id }}">
                        <input type="checkbox" @if($new->status == 1) checked @endif
                        data-toggle="toggle" data-on="Hiện"
                        data-off="Ẩn" data-onstyle="success" data-offstyle="danger"
                        >
                    </a>
                </td>
                <td>{{$new->created_at->format('d-m-Y')}}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{route('news.edit',[$new->id])}}">Sửa</a>
                    <form id="deactive_form_{{ $new->id }}" action="{{ route('news.destroy',$new->id) }}"
                        method="post" style="display: none;">
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
$("a[id^='btn_deactive_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_deactive_', '');
    $("#deactive_form_" + id).submit();
});
</script>
@endpush