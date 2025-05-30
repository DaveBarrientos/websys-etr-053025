@extends('frontend.layouts.master')

@section('title','Ecommerce Laravel || Register Page')

@section('main-content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0);">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shop Login -->
<section class="shop login section">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2>Register</h2>
                    <!-- Form -->
                    <form class="form" method="post" action="{{route('register.submit')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name<span>*</span></label>
                                    <input type="text" name="name" required="required" value="{{old('name')}}">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email<span>*</span></label>
                                    <input type="text" name="email" required="required" value="{{old('email')}}">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Password<span>*</span></label>
                                    <input type="password" name="password" required="required">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Confirm Password<span>*</span></label>
                                    <input type="password" name="password_confirmation" required="required">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-register" type="submit">Register</button>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <a href="{{route('login.form')}}" class="btn btn-login">Back to Login</a>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Login -->
@endsection

@push('styles')
<style>
    /* REGISTER BUTTON STYLES */
    .btn-register {
        background-color: white;
        color: #ec2a32 !important;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 600;
        border: 2px solid #ec2a32;
        border-radius: 4px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(236, 42, 50, 0.3);
    }

    .btn-register:hover {
        background-color: #ec2a32 !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(236, 42, 50, 0.4);
    }

    /* LOGIN BUTTON STYLES */
    .btn-login {
        background-color: #FFF;
        color: black !important;
        padding: 10px 30px;
        font-size: 16px;
        font-weight: 600;
        border: 2px solid #000;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        background-color: black !important;
        color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    /* General form styles */
    .login-form {
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .login-form h2 {
        margin-bottom: 25px;
        font-weight: 700;
        color: #333;
    }

    .form-group label {
        font-weight: 600;
        color: #555;
    }

    .bread-list li {
        display: inline;
        font-weight: 600;
        color: #333;
        margin-right: 6px;
    }

    .bread-list li a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .bread-list li a:hover {
        color: #ec2a32;
    }

    .bread-list li.active a {
        color: #39579A;
        pointer-events: none;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: border 0.3s ease;
    }

    input:focus {
        border-color: #ec2a32;
        box-shadow: 0 0 0 0.2rem rgba(236,42,50,0.25);
    }
</style>
@endpush