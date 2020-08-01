@extends('./backend/layout/master')
@section('title','Tài khoản')
@section('content')
<section class="content ">
    <div class="container-fluid">
        <div class="row">
        @if(session('thongbao'))
                    <section class="alert-noti">
                        <div class="d-flex align-items-center">
                            <div class="col-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512"
                                    style="enable-background:new 0 0 512 512;" xml:space="preserve" width="50px"
                                    height="50px">
                                    <g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.853,256-256S397.167,0,256,0z M256,472.341    c-119.275,0-216.341-97.046-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.046,216.341,216.341    S375.275,472.341,256,472.341z"
                                                    data-original="#000000" class="active-path" data-old_color="#000000"
                                                    fill="#FFFFFF" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M373.451,166.965c-8.071-7.337-20.623-6.762-27.999,1.348L224.491,301.509l-58.438-59.409    c-7.714-7.813-20.246-7.932-28.039-0.238c-7.813,7.674-7.932,20.226-0.238,28.039l73.151,74.361    c3.748,3.807,8.824,5.929,14.138,5.929c0.119,0,0.258,0,0.377,0.02c5.473-0.119,10.629-2.459,14.297-6.504l135.059-148.722    C382.156,186.854,381.561,174.322,373.451,166.965z"
                                                    data-original="#000000" class="active-path" data-old_color="#000000"
                                                    fill="#FFFFFF" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="col-10">
                                {{session('thongbao') }}
                            </div>
                            <div class="close-noti">
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                    </section>
                    @endif
            <!-- left column -->
            <div class="col-md-12 p-5">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3>Tài khoản</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" class="d-flex flex-wrap mt-5 p-4" method="post" action="{{ route('account.update',Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <div class="form-group">
                                <img src="/storage/{{$user->avatar}}" alt="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone">Thay ảnh đại diện</label>
                                <input type="file" class="form-control" name="avatar">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Fullname</label>
                                <input type="text" class="form-control" placeholder="Enter username" name="fullname"
                                    value="{{ $user->fullname }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" class="form-control" placeholder="Enter Date Of Birth" name="date_of_birth"
                                    value="{{ $user->date_of_birth }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" placeholder="Enter Date Of Birth" name="phone"
                                    value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" placeholder="Enter Date Of Birth" name="is_active"
                                value="{{$user->is_active}}">
                        </div>
                        <button type="submit"  id="btn_update_{{ $user->id }}" class="btn btn-primary">Sửa thông tin</button>
                    </form>
                    <form id="update_form_{{ $user->id }}"
                                            action="{{ route('account.update',$user->id) }}" method="post"
                                            style="display: none;">
                                            @method('PUT')
                                            @csrf
                                        </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection



@push('scripts')
<script>
$("button[id^='btn_update_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_update_', '');
        $("#update_form_" + id).submit();
});
$('.close-noti').click(function() {
    $('.alert-noti').hide();
});
</script>
@endpush