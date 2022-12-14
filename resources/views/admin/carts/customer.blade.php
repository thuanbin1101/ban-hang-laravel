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
                                    <span class="input-group-text bg-success border-success text-white">
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
                <h4 class="page-title">List Orders</h4>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <table class="table table-striped table-centered mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Order date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $each)
                    <tr>
                        <td>{{ $each->id }}</td>
                        <td class="table-user">
                            {{ $each->name }}
                        </td>
                        <td>{{ $each->email }}</td>
                        <td>{{ $each->phone }}</td>
                        <td>{{ $each->address }}</td>
                        <td class="confirm-{{ $each->id }}">
                            @if ($each->status === 0)
                                <span class="badge badge-danger">Ch??a x??c nh???n</span>
                            @elseif($each->status === 1)
                                <span class="badge badge-success">???? x??c nh???n</span>
                            @elseif($each->status === 2)
                                <span class="badge badge-warning">??ang giao h??ng</span>
                            @endif
                        </td>
                        <td>{{ $each->created_at }}</td>
                        <td class="table-action">

                            <a href="" class="action-confirm"
                                data-url="{{ route('order.confirmOrder', $each->id) }}">
                                <i class="dripicons-checkmark" style="color: #42d29d!important"></i>
                            </a>
                            <a href="{{ route('orderDetail.list', $each->id) }}" class="action-icon">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <form style="display: inline" id="my_form"
                                action="{{ route('customer.destroy', $each->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="javascript:{}" data-url="{{ route('customer.destroy', $each->id) }}"
                                    class="action-icon customer-delete"> <i class="mdi mdi-delete"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><br>
    {!! $customers->links() !!}
@endsection
@push('script')
    <script src="{{ asset('admin/customers/index/list.js') }}"></script>
@endpush
