@extends('frontend.layouts.master')
@section('title','Liên Hệ')
@section('main-content')
 <!-- Begin Li's Breadcrumb Area -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">Liên Hệ</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->     
<!-- Begin Contact Main Page Area -->
<div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
    <div class="container mb-60">
        <div id="google-map"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                <div class="contact-page-side-content">
                    @php
                        $contact=DB::table('settings')->get();
                    @endphp
                    @foreach($contact as $data)
                    <h3 class="contact-page-title">Liên Hệ Với SHOP</h3>
                    <p class="contact-page-message mb-25">{!! $data->description!!}</p>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i>Địa chỉ</h4>
                        <p>{{$data->address}}</p>
                    </div>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i>Điện Thoại</h4>
                        <p>Di động: {{$data->phone}}</p>
                    </div>
                    <div class="single-contact-block last-child">
                        <h4><i class="fa fa-envelope-o"></i> Email</h4>
                        <p>{{$data->email}}</p>
                      
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="contact-form-content pt-sm-55 pt-xs-55">
                    <h3 class="contact-page-title">Liên hệ chúng tôi</h3>
                    <div class="contact-form">
                        <form  id="contact-form" action="{{route('contact.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Họ Tên<span class="required">*</span></label>
                                <input type="text" name="name" id="customername" required>
                            </div>
                            <div class="form-group">
                                <label>Email <span class="required">*</span></label>
                                <input type="email" name="email" id="customerEmail" required>
                            </div>
                            <div class="form-group">
                                <label>Điện Thoại <span class="required">*</span></label>
                                <input type="text" name="phone" id="customerEmail" required>
                            </div>
                            <div class="form-group">
                                <label>Chủ Đề</label>
                                <input type="text" name="subject" id="contactSubject">
                            </div>
                            <div class="form-group mb-30">
                                <label>Nội dung muốn gửi</label>
                                <textarea name="message" id="contactMessage" ></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="submit" id="submit" class="li-btn-3" name="submit">Gủi</button>
                            </div>
                        </form>
                    </div>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Main Page Area End Here -->
@endsection