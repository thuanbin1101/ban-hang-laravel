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
                <h4 class="page-title">Edit Permission</h4>
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
        <form class="col-md-12" method="POST" action="{{route('permissions.update',$permission->id)}}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Name Permission</label>
                    <input name="name" value="{{$permission->name}}" type="text" class="form-control" id="inputEmail4"
                           placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">DisplayName Permission</label>
                    <input name="display_name" value="{{$permission->display_name}}" type="text" class="form-control"
                           id="inputEmail4" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Key Code Permission</label>
                    <input name="key_code" type="text" value="{{$permission->key_code}}" class="form-control"
                           id="inputEmail4" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword5" class="col-form-label">Select Parent Permission</label>
                <select name="parent_id" class="custom-select mb-3">
                    <option selected value="0">Parent Menu</option>
                    {!!    $htmlOptionPermission !!}
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('script')
    <script src="{{asset('admin/role/create/create.js')}}"></script>
@endpush
