@extends('./student/layout/master')
@section('content')
<section class="content" style="background-color:#F4F6F9">
    <div class="card card-widget">
        <div class="card-header">
            <div class="user-block">
                <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username mb-2">{{$notification->title}}</span>
                <span class="description">Ngày Đăng: {{$notification->created_at}}</span>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <p>{{$notification->content}}</p>
        </div>
    </div>
</section>
@endsection