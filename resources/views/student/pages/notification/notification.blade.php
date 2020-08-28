@extends('./student/layout/master')
@section('content')
    <div class="container-fluid">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                    <span class="username mb-2">{{$notification->title}}</span>
                    <p class="description">Ngày Đăng: {{$notification->created_at}}</p>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <p>{{$notification->content}}</p>
            </div>
        </div>
    </div>
@endsection