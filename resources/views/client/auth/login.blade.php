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
                                <h3 class="text-uppercase">Login to <strong>Colorlib</strong></h3>
                            </div>

                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $message)
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button>
                                        <span>{{ $message }}</span>
                                    </div>
                                @endforeach
                            @endif


                            <form action="{{ url('client/login') }}" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" placeholder="your-email@gmail.com"
                                        name="email" id="email">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Your Password" name="password"
                                        id="password">
                                </div>

                                <div class="d-sm-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember
                                            me</span>
                                        <input type="checkbox" name="remember_me"/>
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                                </div>

                                <input type="submit" value="Log In" class="btn btn-block py-2 btn-primary">

                                <span class="text-center my-3 d-block">or</span>


                                <div class="">
                                    <a href="{{ route('client.register') }}" class="btn btn-block py-2 text-white btn-primary">
                                        Register
                                    </a>
                                    <a href="#" class="btn btn-block py-2 btn-facebook">
                                        <span class="icon-facebook mr-3"></span> Login with facebook
                                    </a>
                                    <a href="#" class="btn btn-block py-2 btn-google"><span
                                            class="icon-google mr-3"></span> Login with Google</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
