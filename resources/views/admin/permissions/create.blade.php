@extends('admin.layouts.master')
@push("css")
    <link href="{{asset('admin/role/create/create.css')}}" rel="stylesheet"/>
@endpush
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
                <h4 class="page-title">Create Permission</h4>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session('fail'))
        <div class="alert alert-danger" role="alert">
            {{ session('fail') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <form class="col-md-12" method="POST" action="{{route('permissions.store')}}"
              enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Name Permission</label>
                    <input name="name" type="text" class="form-control" id="inputEmail4" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">DisplayName Permission</label>
                    <input name="display_name" type="text" class="form-control" id="inputEmail4" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Key Code Permission</label>
                    <input name="key_code" type="text" class="form-control" id="inputEmail4" placeholder="">
                </div>
            </div>
            {{--            <div class="form-group">--}}
            {{--                <label for="inputPassword5" class="col-form-label">Select Module</label>--}}
            {{--                <select name="module_parent" class="custom-select mb-3">--}}
            {{--                    <option value="">Select Module</option>--}}
            {{--                    @foreach(config('permissions.table_module')  as $moduleItem)--}}
            {{--                        <option value="{{$moduleItem}}">{{$moduleItem}}</option>--}}
            {{--                    @endforeach--}}
            {{--                </select>--}}
            {{--            </div>--}}
            <div class="form-group">
                <label for="inputPassword5" class="col-form-label">Select Parent Permission</label>
                <select name="parent_id" class="custom-select mb-3">
                    <option selected value="0">Parent Menu</option>
                    {!!    $htmlOptionPermission !!}
                </select>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Simple card -->
{{--                    <div class="card d-block">--}}
{{--                        <div class="card-header" style="background-color: #42d29d;color: white;">--}}
{{--                            <h4 class="card-title" style="transform: translateY(12px);">--}}
{{--                                <label>--}}
{{--                                    <input type="checkbox" class="check-all">--}}
{{--                                    Check All--}}
{{--                                </label>--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row">--}}
{{--                                @foreach(config('permissions.module_children') as $moduleChildren)--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <label>--}}
{{--                                            <input name="module_children[]" value="{{$moduleChildren}}" type="checkbox"--}}
{{--                                                   class="checkbox-childrent">--}}
{{--                                            {{$moduleChildren}}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div> <!-- end card-body-->--}}
{{--                    </div> <!-- end card-->--}}

                </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('script')
    <script src="{{asset('admin/role/create/create.js')}}"></script>
@endpush
