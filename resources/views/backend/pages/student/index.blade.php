@extends('./backend/layout/master')
@section('title','Quản Trị Học Sinh')
@section('title_page','Quản Trị Học Sinh')
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
        <th scope="col">Ảnh</th>
        <th scope="col">Họ Tên</th>
        <th scope="col">Mã SV</th>
        <th scope="col">Phone</th>
        <th scope="col">Trạn Thái</th>
        <th scope="col">
        <a href="{{ route('student.create') }}">
                <button type="button" class="btn btn-outline-primary">Thêm Học Sinh</button>
            </a>
        </th>
      </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach ($get_all_student as $item)
        <tr>
        <th scope="row">{{ $i++ }}</th>
            <td><img width="60px" src="storage/{{ $item->avatar }}" alt=""></td>
            <td>{{ $item->fullname }}</td>
            <td>{{ $item->code }}</td>
            <td>{{ $item->phone }}</td>
            <td>
                @if($item->is_active == 1)
                <p class="text-primary">Hoạt Động</p>
                @else
                <p class="text-warning">Không Hoạt Động</p>
                @endif

            </td>
            <td>
                <a href="{{ route('notifications.show',"$item->id") }}">
            <button type="button" class="btn btn-outline-info">Chi Tiết</button>
                </a>
                <a href="{{ route('notifications.edit',"$item->id") }}">
            <button type="button" class="btn btn-outline-warning">Sửa</button>
                </a>

                <a id="btn_delete_{{ $item->id }}"class="btn btn-outline-danger">Xóa</a>
                          <form id="delete_form_{{ $item->id }}" action="{{ route('student.destroy',$item->id) }}"
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
        {{$get_all_student->links()}}
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
