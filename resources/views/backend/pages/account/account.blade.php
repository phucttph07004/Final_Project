@extends('./backend/layout/master')
@section('title','Tài khoản')
@section('content')
<section class="content ">
    <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3>Tài khoản</h3>
                    </div>
                </div>
                <div class="row">
                    <!-- Profile Image -->
                    <div class="col-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                              <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/storage/{{$user->avatar}}" alt="User profile picture">
                              </div>
                              <h3 class="profile-username text-center">{{$user->fullname}}</h3>
              
                              <p class="text-muted text-center">
                                  @if($user->role==2) Admin
                                  @elseif($user->role == 3) Quản lý
                                  @elseif($user->role == 4) Giáo viên 
                                  @elseif($user->role == 5) Giám đốc 
                                  @endif
                              </p>
              
                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                <b>Ngày sinh</b> <a class="float-right">{{$user->date_of_birth}}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Ngày tạo</b> <a class="float-right">{{$user->created_at}}</a>
                                </li>
                              </ul>
              
                            </div>
                            <!-- /.card-body -->
                          </div>
                    </div>
                    <!-- /.card -->
        
                    <!-- About Me Box -->
                   <div class="col-8">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title" style="font-size:20px;">Thông tin</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>
          
                            <p class="text-muted">{{$user->address}}</p>
              
                              <hr>
                          <strong><i class="fas fa-book mr-1"></i> Email</strong>
          
                          <p class="text-muted">
                           {{$user->email}}
                          </p>
          
                          <hr>
          
                          <strong><i class="fas fa-pencil-alt mr-1"></i> Số điện thoại</strong>
          
                          <p class="text-muted">
                           {{$user->phone}}
                          </p>
                        <a href="{{route('account.edit',$user->id)}}" class="btn btn-outline-primary border-primary">Chính sửa thông tin</a>
                        <a href="{{route('password.edit',$user->id)}}" class="btn btn-outline-primary border-primary">Đổi mật khẩu</a>  
                      </div>
                        <!-- /.card-body -->
                      </div>
                   </div>
                    <!-- /.card -->
                  </div>
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