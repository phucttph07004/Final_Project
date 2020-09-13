@extends('./backend/layout/master')
@section('title','Quản Trị Trang Giới Thiệu')
@section('title_page','Sửa Trang Giới Thiệu')
@section('content')
<form role="form" method="POST" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="">Tiêu đề</label>
            <input type="text" class="form-control" name="title" id="" value="{{ $about->title }}">
            {!! ShowErrors($errors,'title') !!}
        </div>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <label for="">Nội dung</label>
                            <!-- tools box -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                            <div class="mb-3">
                                <textarea name="content" class="textarea" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                        {{ $about->content }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
    </div>
    <div class="card-footer">
        <a href="{{route('news.index')}}" class="btn btn-danger">Quay lại</a>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>

    </section>
    @endsection