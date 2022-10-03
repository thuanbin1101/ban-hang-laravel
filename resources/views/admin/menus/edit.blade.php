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
                <h4 class="page-title">Edit Category</h4>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <form class="col-md-12" method="POST" action="{{route('menus.update',$menu->id)}}"
              enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Name Category</label>
                    <input name="name" value="{{$menu->name}}" type="text" class="form-control" id="inputEmail4"
                           placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword5" class="col-form-label">Select Parent Category</label>
                <select name="parent_id" class="custom-select mb-3">
                    <option selected value="0">Parent Category</option>
                    {!!    $htmlOptionMenu !!}
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
