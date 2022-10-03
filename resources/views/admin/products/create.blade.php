@extends('admin.layouts.master')
@push("css")
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
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
        <form class="col-md-12" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Name Product</label>
                    <input name="name" type="text" class="form-control" id="inputEmail4" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail4" class="col-form-label">Price Product</label>
                {{--                <input name="price" type="text" class="form-control" id="inputEmail4" placeholder="">--}}
                <input type="text" name="price" class="form-control" id="currency-field"
                       pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"
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
                <textarea id="mytextarea" name="content" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/o9bdykr38uld5i7zkhn4eqt5oap4d75v9kp7uv58fvs3aijf/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        $(".tags_select_choose").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
        $(".select2-init").select2({
            placeholder: "Select a state",
            allowClear: true
        })
    </script>
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
    <script>
        // Jquery Dependency
        $("input[data-type='currency']").on({
            keyup: function () {
                formatCurrency($(this));
            },
            blur: function () {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
    </script>
@endpush
