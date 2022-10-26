<div class="left-side-menu">

    <!-- LOGO -->
    <a href="{{route('home')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('admin/assets/images/logo.png')}}" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('admin/assets/images/logo_sm.png')}}" alt="" height="16">
                    </span>
    </a>

    <!-- LOGO -->
    <a href="{{route('home')}}" class="logo text-center logo-dark">
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

            <li class="side-nav-title side-nav-item">Apps</li>
            <li class="side-nav-item">
                <a href="{{route('home')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-users-alt"></i>
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
                    <i class="mdi mdi-package-variant-closed"></i>
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
                    <i class="mdi mdi-xbox-controller-menu"></i>
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
                    <i class="uil-sliders-v"></i>
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
                    <i class="mdi mdi-settings-transfer-outline"></i>
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
                    <i class="uil-shopping-cart-alt"></i>
                    <span> Carts </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('customer.list')}}">List Orders</a>
                    </li>

                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-shield"></i>
                    <span> Roles Permissions </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('roles.index')}}">List Roles</a>
                    </li>
                    <li>
                        <a href="{{route('roles.create')}}">Create Role</a>
                    </li>
                    <li>
                        <a href="{{route('permissions.index')}}">List Permissions</a>
                    </li>
                    <li>
                        <a href="{{route('permissions.create')}}">Create Permission</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
