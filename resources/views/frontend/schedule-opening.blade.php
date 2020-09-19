@extends('frontend.layout.layout')
@section('content')
<!-- Start breadcrumb -->
@foreach($settings as $setting)
<section class="breadCrumb"
    style="background: url(storage/{{$setting->breadcrumb}}); background-repeat: no-repeat;background-size:cover;">
    <div class="container">
        <h1 class="breadCrumb__title">Lịch khai giảng </h1>
    </div>
    <a href="{{route('home.index')}}" class="breadCrumb__homeIcon">
        <i class="fa fa-home"></i>
    </a>
</section>
@endforeach
<!-- End breadcrumb -->
<div class="schedule-opening" style="padding:100px 0;">
    <div class="container">
        @foreach($levels as $level)
           <div class="schedule-opening__inner">
            <div class="schedule-opening__head">
                Level: {{$level->level}}
            </div>
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Lớp</th>
                        <th scope="col">Ngày dự kiến khai giảng</th>
                        <th scope="col">Thời gian học</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php $i=1?>
                    @foreach($classes as $class)
                    @if($level->id == $class->level_id)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$class->name}}</td>
                        <td>{{$class->start_date}}</td>
                        @foreach($schedules as $schedule)
                        @if($schedule->class_id == $class->id)
                        <td>
                                @if($schedule->slot == 1) Buổi sáng
                                @elseif ($schedule->slot == 2) Buổi sáng
                                @elseif ($schedule->slot == 3) Buổi chiều
                                @elseif ($schedule->slot == 4) Buổi chiều
                                @elseif ($schedule->slot == 5) Buổi tối
                                @elseif ($schedule->slot == 6) Buổi tối
                                @else
                                Đang cập nhật...
                                @endif
                        </td>
                        @endif
                        @endforeach
                    </tr>
                    @else
                    <td colspan="7">
                        <div class="mt-5 col-12 justify-content-center d-flex">
                            <div class=" alert alert-danger" role="alert">
                                Hiện tại chưa có lớp sắp khai giảng
                            </div>
                        </div>
                    </td>
                    @endif
                    @endforeach
                </tbody>
            </table>
           </div>
        @endforeach
    </div>
</div>

@endsection

@push('scripts')
<script>
   
</script>
@endpush