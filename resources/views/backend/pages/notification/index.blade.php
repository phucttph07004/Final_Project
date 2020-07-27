@extends('./backend/layout/master')
@section('title','Quản Trị Thông Báo')
@section('title_page','Quản Trị Thông Báo')
@section('content')
<table style="background-color: white" class="table">
    @if(session('thongbao'))
    <div class="alert alert-primary text-center" role="alert">
        {{session('thongbao') }}
      </div>
    @endif
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tiêu Đề</th>
        <th scope="col">Loại Thông Báo</th>
        <th scope="col">Người Gửi</th>
        <th scope="col">Ngày Gửi</th>
        <th scope="col">
        <a href="{{ route('notifications.create') }}">
                <button type="button" class="btn btn-outline-primary">Gửi Thông Báo</button>
            </a>
        </th>
      </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach ($get_all_notification as $item)
        <tr>
        <th scope="row">{{ $i++ }}</th>
            <td>{{ $item->title }}</td>
            <td>{{ $item->categoryName->name }}</td>
            <td>{{ $item->userName->fullname }}</td>
            <td>{{ Carbon\carbon::parse($item->created_at)->format('d-m-Y') }}</td>
            <td>
                <a href="{{ route('notifications.show',"$item->id") }}">
            <button type="button" class="btn btn-outline-info">Chi Tiết</button>
                </a>
                <a href="{{ route('notifications.edit',"$item->id") }}">
            <button type="button" class="btn btn-outline-warning">Sửa</button>
                </a>

                <a id="btn_delete_{{ $item->id }}"class="btn btn-outline-danger">Xóa</a>
                          <form id="delete_form_{{ $item->id }}" action="{{ route('notifications.destroy',$item->id) }}"
                            method="post"style="display: none;"
                            >
                            @method('DELETE')
                            @csrf
                          </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
 <div class="container justify-content-center d-flex mt-5 pb-5">
        {{$get_all_notification->links()}}
    </div>
@endsection

@push('scripts')
<script>
  $("a[id^='btn_delete_']").click(function (event) {
    id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
    if(confirm('Bạn có muốn xóa không')){
    $("#delete_form_" + id).submit();
    }
  });
</script>
@endpush
