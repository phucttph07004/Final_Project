@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Thêm Mới Học Viên')
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
      
    <input name="fullname" type="text" value="{{ old('fullname') }}" class="form-control" >
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ảnh</label>
      <br>
        
        <input type="file" name="avatar" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">ngày Sinh</label>
      <br>
        
        <input name="date_of_birth" value="{{ old('date_of_birth') }}" type="date" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
      <br>
       
        <input name="phone" value="{{ old('phone') }}" type="number" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">email</label>
      <br>
       
        <input name="email" value="{{ old('email') }}" type="email" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
      <br>
       
        <input name="address" value="{{ old('address') }}" type="text" class="form-control" >
      </div>





      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Chọn Chi Nhánh Lever Và Lớp</button>
        <br>
       
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
                    <label for="id_{{$class->id}}">{{$class->class_name}}</label>
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


    <button type="submit" class="mt-5 mb-5 btn btn-primary">Thêm Học Viên</button>
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
