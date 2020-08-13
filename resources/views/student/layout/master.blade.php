@include('student.layout.header')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  @include('student.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header pt-5">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: #007bff" class="mt-5 pl-5 m-0 font-weight-bold">@yield('title_page')</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section style="background-color: white" class="content ">
        @yield('content')
    </section>
  </div>
  @include('student.layout.footer')