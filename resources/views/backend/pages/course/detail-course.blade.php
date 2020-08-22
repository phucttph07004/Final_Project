@extends('./backend/layout/master')
@section('title','Chi tiết khoá học')
@section('title_page','Chi tiết khoá học')
@section('content')

<section class="content">
    <div class="ml-5 pt-3" style="font-size:18px">
       <p class="mr-3">Khoá: {{$course->course_name}}</p>
       <p class="mr-3">Ngày khai giảng: {{date('d-m-Y', strtotime($course->start_date))}}</p>
       <p class="mr-3">Ngày kết thúc dự kiến: {{date('d-m-Y', strtotime($course->finish_date))}}</p>
    </div>
    <h2 class="ml-5">Danh sách các lớp trong khoá {{$course->course_name}}</h2>

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

@push('scripts')
<script>
</script>
@endpush