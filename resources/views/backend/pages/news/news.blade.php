@extends('backend.layout.master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3 class=" mr-5">Quản lý tin tức</h3>
                            <a href="{{route('news.create')}}" class="btn btn-success col-md-1">Create</a>
                        </div>
                    </div>
                    @if(session('thongbao'))
                    <section class="alert-noti">
                        <div class="d-flex align-items-center">
                            <div class="col-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512"
                                    style="enable-background:new 0 0 512 512;" xml:space="preserve" width="50px"
                                    height="50px">
                                    <g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.853,256-256S397.167,0,256,0z M256,472.341    c-119.275,0-216.341-97.046-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.046,216.341,216.341    S375.275,472.341,256,472.341z"
                                                    data-original="#000000" class="active-path" data-old_color="#000000"
                                                    fill="#FFFFFF" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M373.451,166.965c-8.071-7.337-20.623-6.762-27.999,1.348L224.491,301.509l-58.438-59.409    c-7.714-7.813-20.246-7.932-28.039-0.238c-7.813,7.674-7.932,20.226-0.238,28.039l73.151,74.361    c3.748,3.807,8.824,5.929,14.138,5.929c0.119,0,0.258,0,0.377,0.02c5.473-0.119,10.629-2.459,14.297-6.504l135.059-148.722    C382.156,186.854,381.561,174.322,373.451,166.965z"
                                                    data-original="#000000" class="active-path" data-old_color="#000000"
                                                    fill="#FFFFFF" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="col-10">
                                {{session('thongbao') }}
                            </div>
                            <div class="close-noti">
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                    </section>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Ảnh</th>
                                    <th>Tiêu đề</th>
                                    <th>Danh mục</th>
                                    <th>Lượt xem</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $new)
                                <tr>
                                    <td>{{$new->id}}</td>
                                    <td><img src="storage/{{ $new->image }}" width="70px" height="50px"></td>
                                    <td>{{$new->title}}</td>
                                    <td>{{$new->category}}</td>
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
                                        <a class="btn btn-primary" href="{{route('news.edit',[$new->id])}}">Sửa</a>
                                       
                                        @if($new->status == 1)
                                        <button id="btn_delete_{{ $new->id }}" class="btn btn-danger">Ẩn</button>
                                        @else
                                        <button id="btn_delete_{{ $new->id }}" class="btn btn-success">Hiện</button>
                                        @endif
                                        
                                        <form id="delete_form_{{ $new->id }}"
                                            action="{{ route('news.destroy',$new->id) }}" method="post"
                                            style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $news->links() }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
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