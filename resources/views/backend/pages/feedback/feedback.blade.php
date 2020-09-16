@extends('./backend/layout/master')
@section('title','Quản Trị Feedback')
@section('title_page','Quản Trị Feedback')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                                <div class="row pl-5">
                                <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                                    <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Lọc Theo Khóa
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/admin/feedback">Tất cả</a>
                                      @foreach ($courses as $course)
                                        <a class="dropdown-item" href="/admin/feedback?course_id={{$course->id}}">{{$course->course_name}}</a>
                                      @endforeach
                                    </div>
                                </div> 
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            @if(session('thongbao'))
                            <div class="alert alert-primary text-center" role="alert">
                                {{session('thongbao') }}
                            </div>
                            @endif
                            <thead>
                              <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Học viên</th>
                                <th scope="col">Lớp</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Điểm</th>
                              </tr> 
                            </thead>
                            <tbody>
                                @if(count($feedbacks) == 0)
                                    <td colspan="10">
                                        <div class="mt-5 col-12 justify-content-center d-flex">
                                            <div class=" alert alert-danger" role="alert">
                                                Không Có kết Quả Tìm Kiếm Nào
                                            </div>
                                        </div>
                                    </td>
                                @endif
                                <?php $i=1 ?>
                                @foreach ($feedbacks as $feedback)
                                <tr>
                                  <th scope="row">{{ $i++ }}</th>
                                  <td>{{$feedback->fullname}}</td>
                                  <th>{{$feedback->name}}</th>
                                  <td>{{ $feedback->content }}</td>
                                  <td>{{$feedback->score}}</td>
                                  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="container justify-content-center d-flex mt-5 pb-5">
                         {{$feedbacks->links()}}
                        </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('scripts')
<script>
    $("a[id^='btn_edit_status_']").click(function(event) {
        id = event.currentTarget.attributes.id.value.replace('btn_edit_status_', '');
        if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái?')) {
            $("#btn_edit_status_form_" + id).submit();
        }
    });
</script>
@endpush 