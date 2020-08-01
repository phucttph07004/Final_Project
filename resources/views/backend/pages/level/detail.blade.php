@extends('./backend/layout/master')
@section('title','Quản Trị Level')
@section('title_page','Chi Tiết Level')
@section('content')
<form class="pl-5 pt-5" action="{{ route('level.store') }}" method="POST">
    <div class="form-group pb-5">
      <label for="exampleFormControlInput1">Level</label>
      <input name="level"  value="{{ $get_level->level }}" type="text" class="form-control" >
    </div>
  </form>
  @endsection
