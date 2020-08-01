@extends('backend.layout.master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa Tin Tức</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('news.update', $news->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" id="" value="{{ $news->title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
                                <textarea name="content" class="form-control" id="" cols="30" rows="10">
                                {{ $news->content }}
                                </textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection