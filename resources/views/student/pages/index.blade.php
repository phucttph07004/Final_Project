@extends('./student/layout/master')
@section('content')
<section class="content" style="background-color:#F4F6F9">
    <div class="row ml-4" style="background-color:#fff; box-shadow:  -1px 2px 10px lightgrey;">
        <div class="col-6">
            <div class="notification__item" style="padding:20px;">
                <ul class="pl-0">
                    @foreach ($notifications as $notification)
                    <li style="list-style:none"><a href="">{{$notification->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection