@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Quản Trị Học Viên')
@section('content')

    <div class="col-12 ">
        <div style="padding-left: 430px" class="row bg-light form-inline">
            <div class="">
                <div class="row">
                    <div class="dropdown pt-3 pb-4 mr-2 mt-2">
                        <button class="border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Chọn theo khóa
                        </button>
                        <div style="width: 172px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach($courses as $course)
                            <a class="dropdown-item" href="/admin/revenue?course_id={{$course->id}}">{{$course->course_name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <canvas id="bar-chart" width="400" height="250"></canvas>
    </div>
    </div>

<script>
 new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: [
        <?php 
            foreach($name as $item){
                echo("'Level: ".$item->level."'".",");
            }
        ?>
      ],
      datasets: [
        {
          label: "Doanh thu(Triệu Đồng)",
          backgroundColor: [
              <?php
              if(!empty($total)){
                for($i = 0; $i < count($total); $i++){
                    echo("'"."#85$i"."'".",");
                }
              }
              else{
                  echo('123123');
              }
                
                ?>
          ],
          data: [
            <?php 
            if(!empty($total)){
                for($i = 0; $i < count($total); $i++)
                    echo($total[$i].",");
            }
            else{
                
            }

           
            ?>
          ]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Doanh thu khóa {{$course_name->course_name}}'
      }
    }
});
</script>



@endsection
@push('scripts')

@endpush
