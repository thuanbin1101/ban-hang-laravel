@extends('client.auth.layouts.app')

@section('content')
    <style>

    </style>
    <div class="d-md-flex half">
        <div class="bg" style="background-image: url('{{ asset('login/images/bg_1.jpg') }}');"></div>
        <div class="contents">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-5">
                                <h3 class="text-uppercase">Register to <strong>Colorlib</strong></h3>
                            </div>
                            @include('alerts.alert')

                            <form action="{{route('client.handleRegister')}}" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Your name"
                                           name="name" id="name">
                                </div>
                                <div class="form-group first">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" placeholder="your-email@gmail.com"
                                           name="email" id="email">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Your Password"
                                           name="password"
                                           id="password">
                                </div>

                                <input type="submit" value="Submit" class="btn btn-block py-2 btn-primary">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
