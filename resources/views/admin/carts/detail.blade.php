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
                <h4 class="page-title">List Customer</h4>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <!-- Simple card -->
            <div class="card d-block">
                <div class="card-header" style="background-color: #42d29d;color: white;">
                    <h4 class="card-title" style="transform: translateY(12px);">
                        Order Detail
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title col-md-3" style="transform: translateY(12px);">
                            <label for="">Name:</label> {{$customer->name}}
                        </h5>
                    </div>
                    <div class="row">
                        <h5 class="card-title col-md-3" style="transform: translateY(12px);">
                            <label for="">Email:</label> {{$customer->email}}
                        </h5>
                    </div>
                    <div class="row">
                        <h5 class="card-title col-md-3" style="transform: translateY(12px);">
                            <label for="">Phone:</label> {{$customer->phone}}
                        </h5>
                    </div>
                    <div class="row">
                        <h5 class="card-title col-md-3" style="transform: translateY(12px);">
                            <label for="">Address:</label> {{$customer->address }}
                        </h5>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div><!-- end col -->

    </div>
    <div class="row">
        <table class="table table-striped table-centered mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0;@endphp
            @foreach($carts as $each)
                @php $subtotal = $each->product->price * $each->quantity;@endphp
                @php $total += $each->product->price * $each->quantity;@endphp
                <tr>
                    <td>{{$each->id}}</td>
                    <td><img src="{{asset($each->product->feature_image_path)}}" alt="" width="100px" height="100px">
                    </td>
                    <td>{{$each->product->name}}</td>
                    <td>{{number_format($each->product->price)}} VNĐ</td>
                    <td>{{$each->quantity}}</td>
                    <td>{{number_format($subtotal)}} VNĐ</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" class="text-right" style="font-weight: bold; font-size: 20px;">Total</td>
                <td style="font-size: 20px;
    color: #1072fb;">{{number_format($total)}} VNĐ
                </td>
            </tr>
            </tbody>
        </table>
    </div><br>
    {{--    {!!$customers->links()!!}--}}
@endsection
@push('script')
    <script src="{{asset('admin/menu/index/list.js')}}"></script>
@endpush
