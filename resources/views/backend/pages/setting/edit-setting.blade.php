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
                    <form role="form" method="POST" action="{{ route('setting.update', $setting->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Logo</label> <br>
                                <img src="storage/{{ $setting->logo }}" width="30%" alt="">
                                <input type="file" name="logo">
                            </div>
                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" class="form-control" name="title" id="" value="{{ $setting->slogan }}">
                                {!! ShowErrors($errors,'title') !!}
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="title" id="" value="{{ $setting->email }}">
                                {!! ShowErrors($errors,'title') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" name="title" id="" value="{{ $setting->phone }}">
                                {!! ShowErrors($errors,'title') !!}
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