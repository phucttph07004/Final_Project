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
                        <h3 class="card-title">Setting</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('setting.update', $setting->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                        <div class="form-group">
                                <label for="">Logo</label> <br>
                                <img src="storage/{{ $setting->logo }}" width="30%" alt="">
                            </div>
                            <div class="form-group">
                                <label for="">Thay logo</label> <br>
                                <input type="file" name="logo">
                                {!! ShowErrors($errors,'logo') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" class="form-control" name="slogan" id="" value="{{ $setting->slogan }}">
                                {!! ShowErrors($errors,'slogan') !!}
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" id="" value="{{ $setting->email }}">
                                {!! ShowErrors($errors,'email') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="" value="{{ $setting->phone }}">
                                {!! ShowErrors($errors,'phone') !!}
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