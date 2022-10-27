@extends('admin.layouts.master')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <div class="input-group-append">
                                                        <span
                                                            class="input-group-text bg-success border-success text-white">
                                                            <i class="mdi mdi-calendar-range font-13"></i>
                                                        </span>
                                </div>
                            </div>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-success ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Dashboards</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5 col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-account-multiple widget-icon bg-success-lighten text-success"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Người dùng</h5>
                            <h3 class="mt-3 mb-3">{{$usersCount}}</h3>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Đơn hàng</h5>
                            <h3 class="mt-3 mb-3">{{$ordersCount}}</h3>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-currency-usd widget-icon bg-info-lighten text-info"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Average Revenue">Doanh thu</h5>
                            <h3 class="mt-3 mb-3">{{number_format($totalPrice)}} VNĐ</h3>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-pulse widget-icon bg-warning-lighten text-warning"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Growth">Sản phẩm</h5>
                            <h3 class="mt-3 mb-3">{{$productCount}}</h3>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="uil-store widget-icon bg-primary-lighten text-warning"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Growth">Danh mục</h5>
                            <h3 class="mt-3 mb-3">{{$categoriesCount}}</h3>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="uil-shield widget-icon bg-info-lighten text-warning"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Growth">Vai trò</h5>
                            <h3 class="mt-3 mb-3">{{$rolesCount}}</h3>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

            </div> <!-- end row -->

        </div> <!-- end col -->
        <div class="col-xl-7 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mt-2">Top sản phẩm bán chạy</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>

                            @foreach($salaries as $each)
                                <tr>
                                    <td>
                                        <img width="30px" height="30px" src="{{asset($each->product_image)}}" alt="">
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 font-weight-normal">{{$each->product_name}}</h5>
                                        <span class="text-muted font-13">Tên Sản phẩm</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 font-weight-normal">{{number_format($each->product_price)}}
                                            VNĐ</h5>
                                        <span class="text-muted font-13">Giá</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 font-weight-normal">{{$each->productSold_quantity}}</h5>
                                        <span class="text-muted font-13">Đã bán</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 font-weight-normal">{{number_format($each->productPrice_sum)}}
                                            VNĐ</h5>
                                        <span class="text-muted font-13">Tổng thu</span>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>

@endsection

