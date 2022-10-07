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
                <h4 class="page-title">List Settings</h4>
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
                <th>Config Key</th>
                <th>Config Value</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($settings as $each)
                <tr>
                    <td>{{$each->id}}</td>
                    <td class="table-user">
                        {{$each->config_key}}
                    </td>
                    <td class="table-user">
                        {{$each->config_value}}
                    </td>
                    <td class="table-action">
                        <a href="{{route('settings.edit',$each->id)}}" class="action-icon"> <i
                                class="mdi mdi-pencil"></i></a>
                        <form style="display: inline" id="my_form" action="{{route('settings.destroy',$each->id)}}"
                              method="POST">
                            @method("DELETE")
                            @csrf
                            <a href="javascript:{}"
                               data-url="{{route("settings.destroy",$each->id)}}"
                               class="action-icon setting-delete"> <i class="mdi mdi-delete"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><br>
    {!!$settings->links()!!}
@endsection
@push('script')
    <script src="{{asset('admin/setting/index/list.js')}}"></script>
@endpush
