@extends('./backend/layout/master')
@section('title','Quản Trị Học Sinh')
@section('title_page','Thêm Mới Học Sinh')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('student.store') }}" method="POST">
    @csrf
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif
    <div class="form-group">
      <label for="exampleFormControlInput1">Họ Tên</label>
    <br>
      {!! ShowErrors($errors,'fullname') !!}
      <input name="fullname" type="text" class="form-control" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ảnh</label>
      <br>
        {!! ShowErrors($errors,'avatar') !!}
        <input type="file" name="avatar" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">ngày Sinh</label>
      <br>
        {!! ShowErrors($errors,'date_of_birth') !!}
        <input name="date_of_birth" type="date" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
      <br>
        {!! ShowErrors($errors,'phone') !!}
        <input name="phone" type="number" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">email</label>
      <br>
        {!! ShowErrors($errors,'email') !!}
        <input name="email" type="email" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
      <br>
        {!! ShowErrors($errors,'address') !!}
        <input name="address" type="text" class="form-control" >
      </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Lever</label>
      <br>
        {!! ShowErrors($errors,'class_id') !!}
    <div class="row">
        @foreach ($get_all_level as $item)
        <div class="form-group ">
        <a class="nav-link pl-2" data-toggle="dropdown" href="#">
            level :{{$item->level}}
            <i class="fa fa-angle-down" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu">
            <p class="pl-2 pr-5">Danh Sách Lớp  level :{{$item->level}}</p>
            @foreach($get_all_class as $value)
            @if($value->level_id == $item->id)
            <div class="col-12">
            <input type="radio" id="id_{{$value->id}}" name="class_id" value="{{$value->id}}">
            <label for="id_{{$value->id}}">{{$value->class_name}}</label>
            </div>
            @endif
            @endforeach
    </div>
</div>
@endforeach


    </div>

















    <button type="submit" class="mb-5 btn btn-primary">Thêm Học Sinh</button>
  </form>
  @endsection


@push('scripts')
  <script>
    $(document).ready(function(){
    $("select#Select1").change(function(){
        var option = $('select[name="Select1"]').find(':selected').attr('class');
        if (option == 'by_class') {
            $(".by_class_all").attr('id','by_class_all');
            $(".by_student_all").attr('id','');
        }
        if(option == 'by_all'){
            $(".by_student_all").attr('id','');
            $(".by_class_all").attr('id','');
        }
    });
});
  </script>
  @endpush
  <style>
    #by_class_all{
        display: block !important;
    }
</style>



