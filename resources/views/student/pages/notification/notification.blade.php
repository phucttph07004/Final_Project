@extends('./student/layout/master')
@section('content')
<section class="content" style="background-color:#F4F6F9">
    <h1>{{$notification->title}}</h1>
    <p>{{$notification->content}}</p>
</section>
@endsection