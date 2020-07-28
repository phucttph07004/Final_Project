@extends('./backend/layout/master')
@section('title','Quản Trị Thông Báo')
@section('title_page','Gửi Thông Báo')
@section('content')
<form class="pl-5 pt-5" action="{{ route('notifications.store') }}" method="POST">
    @csrf
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif
    <div class="form-group">
      <label for="exampleFormControlInput1">Tiêu Đề</label>
    <br>
      {!! ShowErrors($errors,'title') !!}
      <input name="title" type="text" class="form-control" >
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Loại Thông Báo</label>
      <br>
        {!! ShowErrors($errors,'category_id') !!}
      <select class="form-control" name="category_id" id="type">
        @foreach ($get_all_category as $item)
      <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Nội Dung </label>
      <br>
        {!! ShowErrors($errors,'content') !!}
      <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="mb-5 btn btn-primary">Gửi Thông Báo</button>
  </form>
  @endsection

  {{-- @push('scripts')
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
  @endpush --}}
  <style>
      /* #by_class_all{
          display: block !important;
      } */
      /* #by_studen_all{
          display: block !important;
      } */
  </style>
