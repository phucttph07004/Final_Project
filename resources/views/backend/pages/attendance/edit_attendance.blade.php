@extends('./backend/layout/master')
@section('title','Quản Trị Chi Nhánh')
@section('title_page','Quản Trị Chi Nhánh')
@section('content')


@foreach($classes as $class)
    {{$class->name}}
    {{$class->fee}}
@endforeach


<div class="container justify-content-center d-flex mt-5 pb-5">
    
</div>
@endsection
