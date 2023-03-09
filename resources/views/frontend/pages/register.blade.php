@extends('frontend.layouts.master')
@section('main-content')
@section('title','Đăng Ký')
   <!-- Begin Li's Breadcrumb Area -->
   <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                <li class="active">Đăng Ký Tài Khoản</li>
            </ul>
        </div>
    </div>
</div>
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 ">
                <form action="{{route('register.submit')}}" method="POST">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Đăng Ký Tài Khoản</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <label>Họ </label>
                                <input class="mb-0" name="firstName" type="text" placeholder="Họ" required>
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Tên</label>
                                <input class="mb-0" name="lastName" type="text" placeholder="Tên" required>
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Email*</label>
                                <input class="mb-0" name="email" type="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Mật Khẩu</label>
                                <input class="mb-0" name="password" type="password" placeholder="Mật Khẩu" required>
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Nhập Lại Mật Khẩu</label>
                                <input class="mb-0" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="col-12">
                                <button class="register-button mt-0">Đăng Ký</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection