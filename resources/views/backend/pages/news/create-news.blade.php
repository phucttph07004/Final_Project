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
                        <h3 class="card-title">Thêm Tin Tức</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('news.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" id="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
                                <textarea name="content" class="form-control" id="" cols="30" rows="10">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Type</label>
                                <select class="form-control" name="type" id="">
                                    <option value="new">new</option>
                                    <option value="about">about</option>
                                </select>
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