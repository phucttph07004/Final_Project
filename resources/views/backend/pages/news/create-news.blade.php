@extends('./backend/layout/master')
@section('title','Quản Trị Tin Tức')
@section('title_page','Thêm Mới Tin Tức')
@section('content')
<form role="form" method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề</label>
            <input type="text" class="form-control" name="title" value="{{ old('title')}}" id="">
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
                                    {{ old('content')}}  </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
            {!! ShowErrors($errors,'content') !!}
        </section>

        <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="image" id="">
            {!! ShowErrors($errors,'image') !!}
        </div>

        <div class="form-group">
            <label for="">Danh Mục</label>
            <select class="form-control" name="category_id" id="">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="hidden" name="type" value="new">
        </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-danger"href="{{route('news.index')}}">Quay lại</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection