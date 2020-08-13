@extends('./backend/layout/master')
@section('title','Quản Trị Level')
@section('title_page','Chi Tiết Level')
@section('content')

<section class="content">
    <h2 class="ml-5 pt-3">Danh sách lớp</h2>

    <div class="row ml-5">
        @foreach ($classes as $class)
        <div class="col-4">
            <a class="d-flex align-items-center justify-content-center mb-4 mt-4"
                style="height:200px; background-color:#007BFF;color:#fff; font-size:30px;border-radius:8px;"
                href="{{route('class.show',"$class->id")}}">
                {{$class->name}}
            </a>
        </div>
        @endforeach
    </div>
</section>
@endsection