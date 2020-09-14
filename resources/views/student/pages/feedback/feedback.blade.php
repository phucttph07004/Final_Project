@extends('./student/layout/master')
@section('title','Quản Lý Khoá Học')
@section('title_page','Thêm Mới Khoá Học')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('post.StudentFeedback') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Nội dung Feedback</label>
        <br>
        {!! ShowErrors($errors,'content') !!}
        <input name="content" type="text" value="{{ old('content')}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Đánh giá</label>
        <br>
        {!! ShowErrors($errors,'score') !!}
        <select class="form-control" name="score" id="">
            <?php for ($i=1; $i <11 ; $i++) { 
                echo  '<option value="$i">'.$i.'</option>' ;
            } ?>
        </select>
    </div>
    <div class="d-flex align-items-center">
        <button type="submit" class="btn btn-primary">Gửi Feedback</button>
    </div>

    </div>

</form>
@endsection