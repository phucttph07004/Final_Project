@extends('./backend/layout/master')
@section('title','Quản Trị Chi Nhánh')
@section('title_page','Thêm Mới Chi Nhánh')
@section('content')
<form enctype="multipart/form-data" class="col-10 pl-5 pb-5 pt-5" action="{{ route('branch.store') }}" method="POST">
    @csrf
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif

          <div class="form-group">
            <label for="exampleFormControlInput1">Tên Chi Nhánh</label>
          <br>
            {!! ShowErrors($errors,'branch_name') !!}
            <input name="branch_name" value="{{ old('branch_name') }}" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Địa Chỉ Chi Nhánh</label>
          <br>
            {!! ShowErrors($errors,'address') !!}
        <input name="address" type="text" value="{{ old('address') }}" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Giám Đốc Chi Nhánh</label>
            <br>
            @if(session('error'))
            <span style='color: red'>{{session('error')}}</span>
            @endif
              {!! ShowErrors($errors,'director_id') !!}
            <select class="form-control" name="director_id" id="type">
              @foreach ($get_all_user as $item)
            <option value="{{ $item->id }}">{{ $item->fullname }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh Chi Nhánh</label>
          <br>
            {!! ShowErrors($errors,'avatar') !!}
        <input name="avatar" type="file"  class="form-control" >
          </div>
    <button type="submit" class="mt-3 mb-5 btn btn-primary">Thêm Chi Nhánh</button>
  </form>
  @endsection



