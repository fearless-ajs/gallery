<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{\Illuminate\Support\Facades\Session::get('settings')->app_name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{\Illuminate\Support\Facades\Auth::user()->ImagePath}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.dashboard')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Subscribers
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Albums
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('albums.new')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('albums.all')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Albums</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-play"></i>
                        <p>
                            Videos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('videos.new')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('videos.all')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All videos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Articles
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.new-article')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.all-articles')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All articles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Component
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.open-house-dates')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Open house dates</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">SYSTEM MENU</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Application
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.settings')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.register')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Register</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('homepage.generate')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Homepage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about.generate')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('open-house.generate')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Open House</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">ADMIN DASHBOARD</li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
