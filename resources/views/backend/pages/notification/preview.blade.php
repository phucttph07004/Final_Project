@extends('./backend/layout/master')
@section('title','Quản Trị Thông Báo')
@section('title_page','Xác Nhận Thông Báo')
@section('content')
<form class=" col-10 pl-5 pt-5" action="/notification/store/default" method="POST">
    @csrf

    @if(session('thongbao'))
    <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
    </div>
    @endif

    @if(session('error'))
        <span style='color: red'>{{session('error1')}}</span>
        @endif

    <div class="form-group">
        <label for="exampleFormControlInput1">Người Gửi</label>
        @foreach($get_users as $item)
        @if($Notification['user_id']== $item->id)
        <input type="text" name="user_id" class="form-control" value="{{ $item->fullname}}">
        @endif
        @endforeach
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Loại Thông Báo</label>
        <select class="form-control" name="category_id" id="">
            @foreach($get_categories as $item)
            <option @if($Notification['category_id']==$item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Trạng Thái Thông Báo</label>
        <select class="form-control" name="status" id="">
            <option @if($Notification['status']==1) selected @endif value="1">Thông Báo Bình Thường</option>
            <option @if($Notification['status']==2) selected @endif value="2">Thông Báo Quan Trọng</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Tiêu Đề</label>
        <br>
        {!! ShowErrors($errors,'title') !!}
        <textarea name="title" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $Notification['title']}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Nội Dung Thông Báo</label>
        <br>
        {!! ShowErrors($errors,'content') !!}
        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $Notification['content']}}</textarea>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <select class="form-control" name="is_active" id="">
                            <option>Chọn Xác Nhận</option>
                            <option value="1">Xác Nhận Gửi Thông Báo</option>
                            <option value="2">Lưu thông Báo Vào Nháp</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection