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
                                <input type="text" class="form-control" name="slogan" value="{{ $setting->slogan }}">
                                {!! ShowErrors($errors,'slogan') !!}
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $setting->email }}">
                                {!! ShowErrors($errors,'email') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" value="{{ $setting->phone }}">
                                {!! ShowErrors($errors,'phone') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Banner</label><br>
                                <img width="30%" src="storage/{{$setting->banner}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="">Thay banner</label> <br>
                                <input type="file" class="form-control" name="banner">
                                {!! ShowErrors($errors,'banner') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Welcome</label>
                                <input type="text" class="form-control" name="welcome" value="{{ $setting->welcome }}">
                                {!! ShowErrors($errors,'welcome') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Welcome content</label>
                                <input type="text" class="form-control" name="welcome_content" value="{{ $setting->welcome_content }}">
                                {!! ShowErrors($errors,'welcome_content') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh lời chào</label><br>
                                <img width="30%" src="storage/{{$setting->welcome_image}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="">Thay ảnh</label> <br>
                                <input type="file" class="form-control" name="welcome_image">
                                {!! ShowErrors($errors,'welcome_image') !!}
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh Breadcrumb</label><br>
                                <img width="30%" src="storage/{{$setting->breadcrumb}}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="">Thay Ảnh Breadcrumb</label> <br>
                                <input type="file" class="form-control" name="breadcrumb">
                                {!! ShowErrors($errors,'breadcrumb') !!}
                            </div>

                            <div class="form-group">
                                <label for="">Fanpage</label><br>
                                {!!$setting->fanpage!!}
                                <input type="text" class="form-control" name="fanpage" value="{{ $setting->fanpage }}">
                                {!! ShowErrors($errors,'fanpage') !!}
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