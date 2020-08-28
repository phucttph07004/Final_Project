@extends('./student/layout/master')
@section('title','Bảng tin')
@section('content')
<div class="container-fluid">
   <div class="notification">
    <div class="row">
        <div class="col-6">
            <div class="notification__item">
                <h1>Thông tin học tập</h1>
                <div class="notification__item-list">
                    <ul class="pl-0">
                        @foreach ($notifications as $notification)
                        <li  class="mb-3" style="list-style:none">
                            <a @if($notification->status == 1) style="color:#007BFF;" @else style="color:red" @endif href="{{ route('notification.show',"$notification->id") }}">{{$notification->title}}</a>
                            <p>Người đăng: {{$notification->userName->fullname}}</p>
                            <p>Ngày đăng: {{$notification->created_at->format('d-m-Y')}}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection