@extends('admin.layouts.master')
@push("css")
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin/product/add/add.css')}}" rel="stylesheet"/>
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
                <h4 class="page-title">Create Product</h4>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
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
        <form class="col-md-12" method="POST" action="{{route('products.store')}}"
              enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Name Product</label>
                    <input name="name" value="{{old('name')}}" type="text" class="form-control" id="inputEmail4"
                           placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail4" class="col-form-label">Price Product</label>
                {{--                <input name="price" type="text" class="form-control" id="inputEmail4" placeholder="">--}}
                <input type="text" name="price" class="form-control" id="currency-field"
                       pattern="^\d{1,3}(,\d{3})*(\.\d+)?"
                       value="" data-type="currency" placeholder="VNĐ">
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputEmail4" class="col-form-label">Image Product</label>
                        <input
                            name="feature_image_path" accept="image/*" type="file" class="form-control-file"
                            id="inputEmail4"
                            placeholder=""
                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <br>
                        <img id="blah" style="width: 200px;"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputEmail4" class="col-form-label">Image Product Detail</label>
                        <input
                            multiple
                            onchange="document.getElementById('blah_detail').src = window.URL.createObjectURL(this.files[0])"
                            name="image_path[]" accept="image/*" type="file" class="form-control-file" id="inputEmail4"
                            placeholder="">
                        <br>
                        <img id="blah_detail" style="width: 200px;"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword5" class="col-form-label">Select Category</label>
                <select name="category_id" class="custom-select select2-init">
                    <option value="">Choose Category</option>
                    {!!$htmlOptionCategory!!}
                </select>
            </div>
            <div class="form-group">
                <label for="inputPassword5" class="col-form-label">Select Tag</label>
                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                    <option selected="selected">orange</option>
                    <option>white</option>
                    <option selected="selected">purple</option>
                </select>
            </div>

            <div class="form-group">
                <label for="inputEmail4" class="col-form-label">Content Product</label>
                <textarea id="mytextarea" name="content" class="form-control my-editor"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
@push('script')
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/o9bdykr38uld5i7zkhn4eqt5oap4d75v9kp7uv58fvs3aijf/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script src="{{asset('admin/product/add/add.js')}}"></script>
@endpush
