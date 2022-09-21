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
                <h4 class="page-title">Edit Product</h4>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <form class="col-md-12" method="POST" action="{{route('products.update',$product->id)}}"
              enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Name Product</label>
                    <input name="name" value="{{$product->name}}" type="text" class="form-control" id="inputEmail4"
                           placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail4" class="col-form-label">Price Product</label>
                <input name="price" value="{{$product->price}}" type="text" class="form-control" id="inputEmail4"
                       placeholder="">
            </div>

            <div class="form-group">
                <label for="inputEmail4" class="col-form-label">Image Product</label>
                <input name="feature_image_path" type="file" class="form-control-file" id="inputEmail4" placeholder="">
                <br><img src="{{asset($product->feature_image_path)}}" alt="">
            </div>
            <div class="form-group">
                <label for="inputPassword5" class="col-form-label">Select Category</label>
                <select name="category_id" class="custom-select mb-3">
                    <option value="">Choose Category</option>
                    @foreach($categories as $each)
                        <option
                            {{$each->id === $product->category_id ? 'selected' : ''}} value="{{$each->id}}">{{$each->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputEmail4" class="col-form-label">Content Product</label>
                <textarea id="mytextarea" name="content" class="form-control">{{$product->content}}"</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
@push('script')
    <script src="https://cdn.tiny.cloud/1/o9bdykr38uld5i7zkhn4eqt5oap4d75v9kp7uv58fvs3aijf/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
@endpush
