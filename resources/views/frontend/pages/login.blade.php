@extends('frontend.layouts.master')

@section('title', 'Login Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="bread-inner">
                        <ul class="bread-list d-inline-block">
                            <li><a href="{{route('home')}}">Home <i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Login</a></li>
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
            <div class="row justify-content-center"> 
                <div class="col-lg-5 col-md-7 col-12">
                    <div class="login-form text-center">
                        <h2>Login</h2>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('login.submit')}}">
                            @csrf
                            <div class="form-group text-left">
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" placeholder="" required="required" value="{{old('email')}}" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group text-left">
                                <label>Password <span>*</span></label>
                                <input type="password" name="password" placeholder="" required="required" value="{{old('password')}}" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-login" type="submit">Login</button>
                            </div>

                            <div class="form-group text-center mt-3">
                                <a href="{{route('register.form')}}" class="btn btn-register">Register</a>
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
    .login-form {
        max-width: 100%;
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    /* LOGIN BUTTON STYLES */
    .btn-login {
        background-color: white;
        color: #ec2a32 !important; /* Red text */
        padding: 12px 40px;
        font-size: 18px;
        font-weight: 600;
        border: 2px solid #ec2a32;
        border-radius: 4px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 8px rgba(236, 42, 50, 0.3); /* Red shadow */
    }

    .btn-login:hover {
        background-color: #ec2a32 !important; /* Red background */
        color: white !important; /* White text */
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(236, 42, 50, 0.4); /* Stronger red shadow */
    }

    /* REGISTER BUTTON STYLES */
    .btn-register {
        background-color: #fff;
        color: black !important;
        padding: 10px 30px;
        font-size: 16px;
        font-weight: 600;
        border: 2px solid #000;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .btn-register:hover {
        background-color: black !important;
        color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    /* Other existing styles */
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

    .form-control {
        border-radius: 4px;
        padding: 12px 15px;
        border: 1px solid #ddd;
        transition: border 0.3s ease;
    }

    .form-control:focus {
        border-color: #ec2a32;
        box-shadow: 0 0 0 0.2rem rgba(236,42,50,0.25);
    }
</style>
@endpush