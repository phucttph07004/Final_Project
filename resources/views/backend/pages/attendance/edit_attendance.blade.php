@extends('./backend/layout/master')
@section('title','Quản Trị Doanh Thu')
@section('title_page','Quản Trị Doanh Thu')
@section('content')




<div class="container justify-content-center d-flex mt-5 pb-5">
<canvas id="bar-chart" width="400" height="250"></canvas>
</div>
<script>
 new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: [],
      datasets: [
        {
          label: "Doanh thu(Triệu Đồng)",
          backgroundColor: [, "#8e5ea2"],
          data: [10,  20]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Doanh thu khóa {{$classes->id}}'
      }
    }
});
</script>

@endsection
 