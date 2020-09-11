@extends('student.layout.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <div class="col-12 text-center mb-3 font-weight-bold">
                                    <input id="minute" type="hidden" value="{{ (int)$time[0] }}">
                                    <input id="seconds" type="hidden" value="{{ (int)$time[1] }}">
                                    <div id="timer">Thời Gian Làm Bài: <span id="m">{{ (int)$time[0] }}</span> Phút : <span id="s">{{ (int)$time[1] }}</span> Giây </span></div>
                                </div>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($question_test as $value)
                            <tr>
                                <td class="button_show">
                                    <div class="col-12">Câu Hỏi Số {{ $i }} : {{ str_replace('\"', '"',str_replace("\'", "'", $value->question) )  }}</div>
                                    <div class="col-12 mt-4">
                                        @foreach(json_decode(str_replace("\'","'",$value->answer)) as $key => $answer)
                                        <div class="form-check">
                                            <input onclick="add_ajax( '{{ $value->question }}','{{ $key }}','{{ $level_id }}','{{ $quiz }}')" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios_{{ $key }}">
                                            <label class="form-check-label" for="exampleRadios_{{ $key }}">
                                                {{ $key.": " }} {{ $answer }}
                                            </label>
                                        </div>
                                        <br>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="pagination"></div>
                    <div style="clear:both;"></div>
                    <style>
                        #pagination {
                            width: 100%;
                            text-align: center;
                            margin-left: -45px;
                        }

                        #pagination ul li {
                            border: 1px solid #17a2b8;
                            padding: 10px;
                            list-style: none;
                            display: inline;
                            float: left;
                            margin-left: 5px;
                        }
                    </style>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
<input type="hidden" id="level_id" value="{{ $level_id }}">
<input type="hidden" id="quiz" value="{{ $quiz }}">
@endsection
{{-- previous --}}
<style>
    .flex-wrap {
        display: none !important;
    }

    .dataTables_filter {
        display: none !important;
    }

    .J-paginationjs-page {
        display: none !important;
    }

    .paginationjs-next {
        cursor: pointer;
    }

    .paginationjs-prev {
        cursor: pointer;
    }

    li.disabled {
        display: none !important;
    }

    button.button_show {
        margin: 60px 200px 200px 375px !important;
    }
</style>
@push('scripts')
<script>
    // ấn chọn đáp án thì update luôn vào đb
    function add_ajax(question, selected_answer, level_id, quiz) {
        // đổi hết các câu có dấu ? thành ký tự khác để chạy đc router
        var question = question.replace('?', '_|_');
        $.ajax({
            url: '/student/quiz/update_selected_answer/' + question + '/' + selected_answer + '/' + level_id + '/' + quiz,
            method: 'get',
            success: function(response) {
                // k đổ dữ liệu
                console.log(response);
            }
        });
    }
    // phân trang
    $(document).ready(function() {
        let rows = []
        $('table tbody tr').each(function(i, row) {
            return rows.push(row);
        });

        $('#pagination').pagination({
            dataSource: rows,
            pageSize: 1,
            callback: function(data, pagination) {
                $('tbody').html(data);
            }
        })
    });
    // lấy thời gian
    $(document).ready(function() {
        var minute = $('#minute').val();
        var sec = $('#seconds').val();
        var time = setInterval(function() {
            document.getElementById("timer").innerHTML = 'Thời Gian Làm Bài: ' + minute + " Phút : " + sec + " Giây";
            sec--;
            if (sec <= 0) {
                minute--;
                sec = 60;
                if (minute <= 0) {
                    document.getElementById("timer").innerHTML = 'Thời Gian Làm Bài Đã Kết Thúc ';
                    $.ajax({
                        url: '/student/quiz/end_time/' + $('#level_id').val() + '/' + $('#quiz').val(),
                        method: 'get',
                        success: function(response) {
                            // k đổ dữ liệu
                            console.log(response);
                        }
                    });
                    $('.button_show').html("<button type='button' class='btn-lg btn btn-primary button_show'>Xem Chi Tiết Bài Làm</button>");
                    $('.paginationjs-pages').html('');
                    clearInterval(time);
                }
            }
        }, 1000);
    });
</script>
@endpush
