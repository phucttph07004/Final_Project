@extends('./student/layout/master')
@section('content')
<section class="content" style="background-color:#F4F6F9">
<h1>Thông báo</h1>
    <div class="row ml-4" style="background-color:#fff; box-shadow:  -1px 2px 10px lightgrey;">
        <div class="col-6">
            <div class="notification__item" style="padding:20px;">
                <ul class="pl-0">
                    @foreach ($notifications as $notification)
                    <li  class="mb-3" style="list-style:none">
                        @if($notification->status == 1) <a style="color:#007BFF;" href="{{ route('notification.show',"$notification->id") }}">{{$notification->title}}</a>
                        @else <a style="color:red;" href="{{ route('notification.show',"$notification->id") }}">{{$notification->title}}</a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection