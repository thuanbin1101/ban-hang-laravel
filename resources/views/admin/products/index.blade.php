@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline form-search" onsubmit="return false;" >
                        <div class="form-group">
                            <div class="input-group">
                                <input data-search="{{route('search.product')}}" placeholder="Search somthing here..."  name="search" type="text" class="search form-control form-control-light" id="dash-daterange">
                                <div class="input-group-append">
                                    <span
                                        class="input-group-text bg-success border-success text-white">
                                        <i class="mdi mdi-magnify search-icon font-13"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('products.index')}}" class="btn btn-success ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">List Products</h4>
            </div>
        </div>
    </div>
    @include('alerts.alert')
    <div class="row">
        <table class="table table-striped table-centered mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="content-body-table">
              @include('admin.products.components.products_component')
            </tbody>
        </table>
    </div><br>
    {!!$products->links()!!}
@endsection
@push('script')
    <script src="{{asset('admin/product/index/list.js')}}"></script>
@endpush
