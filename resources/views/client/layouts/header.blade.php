 <!-- Topbar Start -->
 <div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{route('client.home')}}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">

            @auth
                <a href="" class="btn border">
                    <i class="fas fa-user text-primary"></i>
                    <span class="badge">{{Auth::user()->name}}</span>
                </a>
            @else

            @endauth
            
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <a href="" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">0</span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 99;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        @foreach ($categories as $item)
                        <div class="{{$item->getChildren->count() ? 'nav-item dropdown' : ''}}">
                            <a href="{{ route('client.category', ['slug'=>$item->slug]) }}" class="nav-link" data-toggle="{{$item->getChildren->count() ? 'dropdown' : ''}}">{{$item->name}} <i class="{{$item->getChildren->count() ? 'fa fa-angle-down float-right mt-1' : ''}}"></i></a>
                            <div class="{{$item->getChildren->count() ? 'dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0' : ''}}">
                                @foreach ($item->getChildren as $cate)
                                    <a href="{{ route('client.category', ['slug'=>$cate->slug]) }}" class="dropdown-item">{{$cate->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            @foreach ($menus as $menu)
                            <div class="{{$menu->getChildren->count() ? 'nav-item dropdown' : 'nav-item'}}">
                                <a href="{{ url('/', [$menu->slug]) }}" data-toggle="{{$menu->getChildren->count() ? 'dropdown' : ''}}" class="{{$menu->getChildren->count() ? 'dropdown-toggle active' : ''}} nav-link">{{$menu->name}}</a>
                                @if ($menu->getChildren->count())
                                    <div class="dropdown-menu rounded-0 m-0">
                                        @foreach ($menu->getChildren as $sub_menu)
                                            <a href="{{ url('/', [$sub_menu->slug]) }}" class="dropdown-item">{{$sub_menu->name}}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            @auth
                                <form action="{{ url('client/logout') }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="nav-item btn btn-primary">Logout</button>
                                </form>
                            @else
                                <a href="{{ url('client/login') }}" class="nav-item nav-link">Login</a>
                                <a href="" class="nav-item nav-link">Register</a>
                            @endauth
                        </div>
                    </div>
                </nav>

                @if (request()->is('/'))
                    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($sliders as $slider)
                            @php
                                $count++;
                            @endphp
                            <div class="carousel-item {{$count == 1 ? 'active' : ''}}" style="height: 410px;">
                                <img class="img-fluid" src="{{ asset($slider->image_path) }}" alt="Image">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-prev-icon mb-n2"></span>
                            </div>
                        </a>
                        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-next-icon mb-n2"></span>
                            </div>
                        </a>
                    </div>
                @else

                @endif
            </div>
        </div>
    </div>
    <!-- Navbar End -->
