@extends('backend.layout.master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3 class="card-title mr-5">Quản lý tin tức</h3>
                            <a href="{{route('news.create')}}" class="btn btn-success col-md-1">Create</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Ngày tạo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $new)
                                <tr>
                                    <td>{{$new->id}}</td>
                                    <td>{{$new->title}}</td>
                                    <td>{{$new->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('news.edit',[$new->id])}}">Sửa</a>
                                        <button id="btn_delete_{{ $new->id }}" class="btn btn-danger">Xóa</button>
                                        <form id="delete_form_{{ $new->id }}" onclick="" action="{{ route('news.destroy', $new->id) }}" method="POST" style="display: none;">
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
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                        </ul>
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
    console.log('id', id);

    $("#delete_form_" + id).submit();
});
</script>
@endpush