@extends('./backend/layout/master')
@section('title','Quản Trị Feedback')
@section('title_page','Quản Trị Feedback')
@section('content')
<table style="background-color: white" class="table ml-5">
    @if(session('thongbao'))
    <div class="alert alert-primary text-center" role="alert">
        {{session('thongbao') }}
      </div>
    @endif
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Nội dung</th>
        <th scope="col">Điểm</th>
        <th scope="col">Học viên</th>
      </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach ($feedbacks as $feedback)
        <tr>
        <th scope="row">{{ $i++ }}</th>
            <td>Level: {{ $feedback->content }}</td>
            <td>{{$feedback->score}}</td>
        <td>{{$feedback->studentName->fullname}}</td>
          </tr>
        @endforeach
    </tbody>
  </table>
 <div class="container justify-content-center d-flex mt-5 pb-5">
        {{$feedbacks->links()}}
    </div>
@endsection

@push('scripts')
@endpush
