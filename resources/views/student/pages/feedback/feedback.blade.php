@extends('./student/layout/master')
@section('title','Quản Lý Khoá Học')
@section('title_page','Thêm Mới Khoá Học')
@section('content')
<h3>Đánh giá giáo viên</h3>
                <form action="{{ route('post.StudentFeedback') }}" method="POST">
                @csrf
                <input hidden type="text" name="student_id" value="{{Auth::guard('student')->user()->id}}">
                <input hidden type="text" name="class_id" value="{{Auth::guard('student')->user()->class_id}}">
                    <div class="form-group">
                        <label>Nhận xét về giáo viên</label>
                        <textarea class="form-control" name="content" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Đánh giá</label>
                        <input class="form-control" type="text" name="score">
                    </div>
                    <button type="submit" class="btn">Gửi</button>
                </form>
@endsection