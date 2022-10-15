<div class="left-side-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('admin/assets/images/logo.png')}}" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('admin/assets/images/logo_sm.png')}}" alt="" height="16">
                    </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('admin/assets/images/logo_sm_dark.png')}}" alt="" height="16">
                    </span>
    </a>

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span class="badge badge-success float-right">4</span>
                    <span> Dashboards </span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="dashboard-analytics.html">Analytics</a>
                    </li>
                    <li>
                        <a href="dashboard-crm.html">CRM</a>
                    </li>
                    <li>
                        <a href="index.html">Ecommerce</a>
                    </li>
                    <li>
                        <a href="dashboard-projects.html">Projects</a>
                    </li>
                </ul>
            </li>

            <li class="side-nav-title side-nav-item">Apps</li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Users </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('users.index')}}">List Users</a>
                    </li>
                    <li>
                        <a href="{{route('users.create')}}">Create Users</a>
                    </li>
                </ul>
            </li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Categories </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('categories.index')}}">List Category</a>
                    </li>
                    <li>
                        <a href="{{route('categories.create')}}">Create Category</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Products </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('products.index')}}">List Product</a>
                    </li>
                    <li>
                        <a href="{{route('products.create')}}">Create Product</a>
                    </li>
                </ul>
            </li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Menus </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('menus.index')}}">List Menu</a>
                    </li>
                    <li>
                        <a href="{{route('menus.create')}}">Create Menu</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Sliders </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('sliders.index')}}">List Sliders</a>
                    </li>
                    <li>
                        <a href="{{route('sliders.create')}}">Create Slider</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('settings.index')}}">List Settings</a>
                    </li>
                    <li>
                        <a href="{{route('settings.create')}}">Create Setting</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Roles </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('roles.index')}}">List Roles</a>
                    </li>
                    <li>
                        <a href="{{route('roles.create')}}">Create Role</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
