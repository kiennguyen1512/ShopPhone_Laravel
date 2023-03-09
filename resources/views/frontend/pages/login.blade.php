@extends('frontend.layouts.master')
@section('title', 'Đăng Nhập')
@section('main-content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li class="active">Đăng Nhập</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 ">
                    <!-- Login Form s-->
                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Đăng Nhập</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>Email:</label>
                                    <input class="mb-0" name="email" type="email" placeholder="Email Address">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Mật Khẩu:</label>
                                    <input class="mb-0" name="password" type="password" placeholder="Password">
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input type="checkbox" name="news" id="remember_me">
                                        <label for="remember_me">Ghi Nhớ đăng nhập</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                    <a href="#"> Quên mật khẩu?</a>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="register-button mt-0">Đăng Nhập</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content Area End Here -->
@endsection
