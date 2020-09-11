</div>

<!-- JAVASCRIPT -->
<script src="/js/jquery.min.js"></script>
<script src="/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/metisMenu.min.js"></script>
<script src="/js/simplebar.min.js"></script>
<script src="/js/waves.min.js"></script>

<!-- apexcharts -->

<!-- jquery.vectormap map -->
<script src="/plugins/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<!-- Required datatable js -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->


<!-- Datatable init js -->
<script src="/js/datatables.init.js"></script>

<!-- Responsive examples -->
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

{{-- <script src="/plugins/dashboard/dashboard.init.js"></script> --}}

{{-- phần trang làm bài quiz --}}
<script src="/plugins/pagination/jquery.min.js"></script>
<script src="/plugins/pagination/pagination.min.js"></script>


<script src="/js/app.js"></script>
<script src="/js/attendance.js"></script>

<script>

    function checkabsent(){
        var colCount = $("#datatable tr .absent").length;
        var absent = document.querySelector(".absent-count");
        console.log(absent);
        if(absent == null){
            return 0;
        }else{
            absent.innerHTML = colCount;
        }
    }
    checkabsent();



</script>

@stack('scripts')
</body>

</html>
