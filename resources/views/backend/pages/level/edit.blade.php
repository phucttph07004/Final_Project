@extends('./backend/layout/master')
@section('title','Quản Trị Level')
@section('title_page',' Chỉnh Sửa Level')
@section('content')
<form class="pl-5 pt-5" action="{{ route('level.update',"$get_level->id") }}" method="POST">
    @csrf
    @method('PUT')
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif
    <div class="form-group">
      <label for="exampleFormControlInput1">Level</label>
    <br>
      {!! ShowErrors($errors,'level') !!}
      <input name="level"  value="{{ $get_level->level }}" type="text" class="form-control" >
    </div>
    <button type="submit" class="mb-5 btn btn-primary"> Sửa Level</button>
  </form>
  @endsection