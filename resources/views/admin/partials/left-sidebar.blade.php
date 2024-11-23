<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="{{route('admin.home.index')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('logo.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('logo.png')}}" alt="" height="45">
                    </span>
                </a>
                <a href="{{route('admin.home.index')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('logo.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('logo.png')}}" alt="" height="45">
                    </span>
                </a>
            </div>

            <ul id="side-menu">
                <li>
                    <a href="{{route('admin.home.index')}}" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Home </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.user-register.index')}}" class="tp-link">
                        <i data-feather="check-circle"></i>
                        <span> Registrasi User </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarBulanan" data-bs-toggle="collapse">
                        <i data-feather="database"></i>
                        <span> Master Data </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBulanan">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.user.index')}}" class="tp-link">User</a>
                            </li>
                        </ul>
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.tenant.index')}}" class="tp-link">Tenant</a>
                            </li>
                        </ul>
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.block-user.index')}}" class="tp-link">Blocking</a>
                            </li>
                        </ul>
                    </div>
                </li>
                
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>