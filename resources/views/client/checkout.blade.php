@extends('client.layouts.master')

@section('content')
    @include('alerts.alert')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin khách hàng</h4>
                    <form action="{{route('client.checkoutCart')}}" id="formCheckoutCart" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Họ tên</label>
                                <input name="name" class="form-control" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input name="email" class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <input name="phone" class="form-control" type="text" placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ</label>
                                <input name="address" class="form-control" type="text" placeholder="123 Street">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        @php $total = 0;@endphp
                        @if(count($products) > 0 && isset($carts))
                            @foreach($products as $each)
                                @php $total += $each->price * $carts[$each->id];@endphp
                                <div class="d-flex justify-content-between mt-2 mb-2">
                                    <img height="50px" width="50px" src="{{asset($each->feature_image_path)}}" alt="">
                                    <p style="width: 150px">{{$each->name}} x {{$carts[$each->id]}}</p>
                                    <p style="width: 134px">{{number_format($each->price * $carts[$each->id] )}} VNĐ</p>
                                </div>
                            @endforeach
                        @endif


                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng tiền:</h5>
                            <h5 class="font-weight-bold">{{number_format($total)}} VNĐ</h5>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button id="btnCheckoutCart" type="submit"
                                class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đặt hàng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
@push('js')
    <script src="{{asset('client/cart/cart.js')}}"></script>
@endpush
