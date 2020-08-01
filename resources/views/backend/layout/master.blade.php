@include('backend.layout.header')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  @include('backend.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: #007bff" class="pl-5 m-0 font-weight-bold">@yield('title_page')</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section style="background-color: white" class="content">
        @yield('content')
    </section>
  </div>
  @include('backend.layout.footer')
