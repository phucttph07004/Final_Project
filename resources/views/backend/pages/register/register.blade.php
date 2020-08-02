@extends('./backend/layout/master')
@section('title','Danh Sách Đăng Ký Kiểm Tra Đầu Vào')
@section('title_page','Danh Sách Đăng Ký Kiểm Tra Đầu Vào')
@section('content')
<section class="content">
    <table style="background-color: white" class="table ml-5">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
        <thead>
            <tr>
                <th style="width: 10px">STT</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th>
                    <div class="dropdown mt-2">
                        <button class="border-success bg-white btn btn-secondary dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Lọc Theo Trạng Thái
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/admin/register">Tất cả</a>
                            <a class="dropdown-item" href="/admin/register?is_active=0">Chưa xác nhận</a>
                            <a class="dropdown-item" href="/admin/register?is_active=1">Đã xác nhận</a>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach($registers as $register)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$register->fullname}}</td>
                <td><a href="mailto:{{$register->email}}">{{$register->email}}</a></td>
                <td><a href="tel:{{$register->phone}}">{{$register->phone}}</a></td>
                <td>{{$register->note}}</td>
                <td>
                    @if($register->is_active==0) <span style="color:red"> Chưa xác nhận</span>
                    @else <span style="color:green">Đã Xác nhận</span>
                    @endif
                </td>
                <td class=>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#{{$register->id}}"
                        data-whatever="@mdo">Ghi
                        chú</button>

                    @if($register->is_active == 0) <button id="btn_delete_{{ $register->id }}" type="submit" class="btn btn-success ">Xác
                        nhận</button>
                    @else <button id="btn_delete_{{ $register->id }}" type="submit" class="btn btn-success " disabled>Xác
                        nhận</button>
                    @endif

                    <form id="delete_form_{{ $register->id }}" action="{{ route('register.destroy',$register->id) }}"
                        method="post" style="display: none;">
                        @method('DELETE')
                        <input type="hidden" name="is_active" value="is_active">
                        @csrf
                    </form>
                </td>
                <div class="modal fade" id="{{$register->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form role="form" method="POST" action="{{ route('register.update', $register->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Ghi
                                            chú</label>
                                        <textarea class="form-control" name="note" id="message-text">
                                                       {{ $register->note}}
                                                        </textarea>
                                                        {!! ShowErrors($errors,'note') !!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </tr>

            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
        {{$registers->links()}}
    </div>
</section>
@endsection

@push('scripts')
<script>
$("button[id^='btn_delete_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');

    $("#delete_form_" + id).submit();
});
$('.close-noti').click(function() {
    $('.alert-noti').hide();
});

$('#{{$register->id}}').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
})
</script>
@endpush