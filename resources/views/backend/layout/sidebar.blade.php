<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="/admin" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span
                            class="badge badge-pill badge-success float-right">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                <a href="/admin" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('notifications.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Trị Thông Báo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('student.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Trị Học Viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('schedule_learn.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Trị Lịch Học</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('schedule_teach.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Trị Lịch Dạy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('quiz.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Trị Quiz</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('level.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Trị Levels</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản trị danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('news.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Trị Tin Tức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('setting.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Trị LandingPage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản Trị Đăng ký thi đầu vào</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách đăng ký kiểm tra đầu vào</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản trị nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('course.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản trị khoá học</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('class.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản trị lớp học</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('feedback.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản trị Feedbacks</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('attendance.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Điểm danh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản trị danh sách chờ</p>
                            </a>
                        </li>
                    </ul>
                </li>

               
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->