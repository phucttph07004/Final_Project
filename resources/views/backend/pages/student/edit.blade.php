@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Sửa  Học Viên')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('student.update',"$get_student->id") }}" method="POST">
    @csrf
    @method('PUT')
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif
    <div class="form-group">
      <label for="exampleFormControlInput1">Họ Tên</label>
    <br>
      {!! ShowErrors($errors,'fullname') !!}
    <input name="fullname" value="{{ $get_student->fullname }}" type="text" class="form-control" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ảnh</label>
        <img src="storage/{{ $get_student->avatar }}" alt="">
        <input name="avatar" value="{{ $get_student->avatar }}" type="hidden" >
      <br>
        {!! ShowErrors($errors,'avatar') !!}
        <br>
        <input type="file" name="avatar" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">ngày Sinh</label>
      <br>
        {!! ShowErrors($errors,'date_of_birth') !!}
        <input name="date_of_birth" value="{{ $get_student->date_of_birth }}" type="date" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
      <br>
        {!! ShowErrors($errors,'phone') !!}
        <input name="phone" value="{{ $get_student->phone }}" type="number" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">email</label>
      <br>
        {!! ShowErrors($errors,'email') !!}
        <input name="email" value="{{ $get_student->email }}" type="email" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
      <br>
        {!! ShowErrors($errors,'address') !!}
        <input name="address" value="{{ $get_student->address }}" type="text" class="form-control" >
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Chi Nhánh</label>
        @foreach ($get_all_class as $class)
        @if($get_student->ClassName->id == $class->id)
        @foreach ($get_all_branch as $branch)
        @if($branch->id == $class->branch_id)
        <input readonly name="branch" value="{{ $branch->branch_name }}"  type="text" class="form-control" >
        @endif
        @endforeach
        @endif
        @endforeach
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Lớp hiện tại</label>
        <input  value="{{ $get_student->ClassName->class_name }}" readonly type="text" class="form-control" >
        <input name="class_id" value="{{ $get_student->ClassName->id }}" type="hidden" class="form-control" >
      </div>
      <div class="form-group">
          <label for="exampleFormControlSelect1">Level hiện tại</label>
          <input readonly value="Level : {{ $get_student->ClassName->level_id }}"  type="text" class="form-control" >
        </div>



        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Chọn Chi Nhánh Lever Và Lớp</button>
            <ul class="dropdown-menu">
            @foreach ($get_all_branch as $item)
              <li class="dropdown-submenu">
              <a class="test" tabindex="-1">{{ $item->branch_name }}<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    @foreach ($get_all_level as $level)
                     <li class="dropdown-submenu">
                     <a class="test">Level: {{ $level->level }}<span class="caret"></span></a>
                       <ul class="dropdown-menu">
                        <?php $i=0 ?>
                        @foreach ($get_all_class as $class)
                           @if($class->branch_id == $item->id && $class->level_id == $level->id)
                           <input style="margin-left: 15px;" type="radio" id="id_{{$class->id}}" name="class_id" value="{{$class->id}}">
                           <label class="w-90" for="id_{{$class->id}}">{{$class->class_name}}</label>
                           <br>
                            <?php $i++; ?>
                           @endif
                           @endforeach
                           @if($i == 0)
                           <p style="margin-left: 15px;">Chưa có lớp nào</p>
                           @endif
                       </ul>
                     </li>
                     @endforeach
                   </ul>
               </li>
               @endforeach
            </ul>
          </div>
          <div class="form-group mt-3">
            <label for="exampleFormControlSelect1">Trạng Thái</label>
            <select class="form-control" name="is_active" id="">
                <option @if($get_student->is_active == 1) selected @endif value="1">Hoạt Động</option>
                <option @if($get_student->is_active == 0) selected @endif value="0">Tạm Dừng</option>
            </select>
          </div>


    <button type="submit" class="mt-5 mb-5 btn btn-primary">Sửa Học Viên</button>
  </form>
  <style>
    .dropdown-submenu {
     position: relative;
    }

    .dropdown-submenu .dropdown-menu {
     top: 0;
     left: 100%;
     margin-top: -1px;
    }
    </style>
  @endsection

  @push('scripts')
  <script>
    $(document).ready(function () {
      $('.dropdown-submenu a.test').on("click", function(e){
           $(this).next('ul').toggle();
           e.stopPropagation();
           e.preventDefault();
           });
  });
  </script>
  @endpush



