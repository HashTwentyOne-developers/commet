@extends('admin.layouts.app')

@section('main-content')
<!-- Main Wrapper -->
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Register</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <!-- Form -->
                            <form action="{{ route('admin.register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text"  name="email"placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text"  name="phone_number"placeholder="phone number">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit">Register</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <!-- Social Login -->
                        <div class="social-login">
                            <span>Register with</span>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
                        </div>
                        <!-- /Social Login -->

                        <div class="text-center dont-have">Already have an account? <a href="{{ route('admin.login') }}">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->
@endsection
