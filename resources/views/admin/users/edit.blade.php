@extends('admin.layouts.master')
@push("css")
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet"/>
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #090909;
        }
    </style>

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
                <h4 class="page-title">Edit Users</h4>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <form class="col-md-12" method="POST" action="{{route('users.update',$user->id)}}"
              enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Name</label>
                    <input type="text" value="{{$user->name}}" name="name" class="form-control" id="name"
                           placeholder="Name">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="col-form-label">Email</label>
                    <input type="email" value="{{$user->email}}" name="email" class="form-control" id="inputEmail4"
                           placeholder="Email">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4" class="col-form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4" class="col-form-label">Role</label>
                    <select name="role_id[]" class="form-control select2-init" multiple id="role_id">
                        @foreach($roles as $role)
                            <option
                                {{$roleOfUser->contains('id',$role->id) ? 'selected' : ''}} value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
@push('script')
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script>
        $('.select2-init').select2()
    </script>
@endpush
