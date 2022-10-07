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
                <h4 class="page-title">Edit Setting</h4>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="dropdown" style="float:right">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route("settings.edit",$setting->id).'?type=Text'}}">Text</a>
                    <a class="dropdown-item" href="{{route("settings.edit",$setting->id).'?type=TextArea'}}">TextArea</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <form class="col-md-12" method="POST" action="{{route('settings.update',$setting->id)}}"
              enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Config Key</label>
                    <input name="config_key" value="{{$setting->config_key}}" type="text" class="form-control"
                           id="inputEmail4" placeholder="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Config Value</label>
                    @if(request()->get('type') === "Text")
                        <input value="{{$setting->config_value}}" name="config_value" type="text" class="form-control"
                               id="inputEmail4" placeholder="">
                    @else
                        <textarea name="config_value" class="form-control" id="inputEmail4"
                        >{{$setting->config_value}}</textarea>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
