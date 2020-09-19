@extends('./backend/layout/master')
@section('title','Quản Trị Thông Báo')
@section('title_page','Chi Tiết Thông Báo')
@section('content')

<div class="col-12">
    <form>
    <div class="form-group">
      <label for="exampleFormControlInput1">Người Gửi</label>
      <input type="text" class="form-control" value="{{ $Notification->userName->fullname}}" readonly>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Loại Thông Báo</label>
        <input type="text" class="form-control" value="{{ $Notification->categoryName->name}}" readonly>
      </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Tiêu Đề</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $Notification->title}}</textarea>
      </div>
      <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <!-- /.card-header -->
                    <div class="card-body pad">
                      <h4>Nội dung</h4>
                        <div class="mb-3">
                            <textarea rows="20" name="content" class="textarea" placeholder="Nhập nội dung vào đây"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                {{ $Notification->content}}</textarea>
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
        <label for="exampleFormControlInput1">Ngày Gửi</label>
        <input type="text" class="form-control" value="{{ Carbon\carbon::parse($Notification->created_at)->format('d-m-Y') }}" readonly>
      </div>
      {{-- <div class="form-group">
        <label for="exampleFormControlInput1">Ngày Cập Nhật</label>
        <input type="text" class="form-control" value="{{ Carbon\carbon::parse($Notification->updated_at)->format('d-m-Y') }}" readonly>
      </div> --}}
  </form>
</div>
@endsection
