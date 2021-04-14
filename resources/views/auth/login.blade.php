@extends('layouts.app')
@section('title')
Login / Register
@endsection

@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">login-register</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- login register wrapper start -->
<div class="login-register-wrapper">
    <div class="container">
        <div class="member-area-from-wrap">
            <div class="row">
                @foreach ($errors->all() as $err)
                    <p class="text-danger">{{ $err }}</p>
                @endforeach
                <!-- Login Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap  pr-lg-50">
                        <h2>Sign In</h2>
                        <form action="{{ route('login') }}" method="post">@csrf
                            <div class="single-input-item">
                                <input type="email" name="email"  placeholder="Email or Username" required />
                            </div>
                            <div class="single-input-item">
                                <input type="password" name="password" placeholder="Enter your Password" required />
                            </div>
                            <div class="single-input-item">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                            <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                        </div>
                                    </div>
                                    <a href="#" class="forget-pwd">Forget Password?</a>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button class="sqr-btn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login Content End -->

                <!-- Register Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
                        <h2>Singup Form</h2>
                        <form action="{{ route('register') }}" method="post"> @csrf
                            <div class="single-input-item">
                                <input type="text" name="name" placeholder="Full Name" required />
                            </div>
                            <div class="single-input-item">
                                <input type="email" name="email" placeholder="Enter your Email" required />
                            </div>
                            <div class="single-input-item">
                                <input type="text" name="phone" placeholder="Enter your Phone" required />
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" name="password" placeholder="Enter your Password" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" name="password_confirmation" placeholder="Repeat your Password" required />
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <div class="login-reg-form-meta">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                            <label class="custom-control-label" for="subnewsletter">Subscribe Our Newsletter</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button class="sqr-btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register Content End -->
            </div>
        </div>
    </div>
</div>
<!-- login register wrapper end -->
@endsection
