@extends('./backend/layout/master')
@section('title','Quản Trị Level')
@section('title_page','Quản Trị Level')
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
        <th scope="col">Level</th>
        <th scope="col">Số Lớp Học</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th scope="col">
        <a href="{{ route('level.create') }}">
                <button type="button" class="btn btn-outline-primary">Thêm Level</button>
            </a>
        </th>
      </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach ($get_all_level as $item)
        <tr>
        <th scope="row">{{ $i++ }}</th>
            <td>Level: {{ $item->level }}</td>
            <td>Số Lớp: {{ $item->count_class_count }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="{{ route('level.show',"$item->id") }}">
            <button type="button" class="btn btn-outline-info">Chi Tiết</button>
                </a>
                <a href="{{ route('level.edit',"$item->id") }}">
            <button type="button" class="btn btn-outline-warning">Sửa</button>
                </a>

                <a id="btn_delete_{{ $item->id }}"class="btn btn-outline-danger">Xóa</a>
                          <form id="delete_form_{{ $item->id }}" action="{{ route('level.destroy',$item->id) }}"
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
        {{$get_all_level->links()}}
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