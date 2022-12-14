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
                <h4 class="page-title">List Users</h4>
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
                <th>User</th>
                <th>Account No.</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $each)
                <tr>
                    <td class="table-user">
                        <img src="{{asset('admin/assets/images/users/avatar-2.jpg')}}" alt="table-user"
                             class="mr-2 rounded-circle"/>
                        {{$each->name}}
                    </td>
                    <td>{{$each->id}}</td>
                    <td>{{$each->email}}</td>
                    <td class="table-action">
                        <a href="{{route('users.edit',$each->id)}}" class="action-icon"> <i
                                class="mdi mdi-pencil"></i></a>
                        <form style="display: inline" id="my_form" action="{{route('users.destroy',$each->id)}}"
                              method="POST">
                            @method("DELETE")
                            @csrf
                            @can('delete_user')
                                <a href="javascript:{}" data-url="{{route('users.destroy',$each->id)}}"
                                   class="action-icon user-delete"> <i class="mdi mdi-delete"></i></a>
                            @endcan

                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><br>
    {!!$users->links()!!}
@endsection
@push('script')
    <script src="{{asset('admin/user/index/list.js')}}"></script>
@endpush
