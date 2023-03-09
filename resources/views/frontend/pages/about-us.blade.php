@extends('frontend.layouts.master')
@section('title','Về Chúng Tôi')
@section('main-content')
 <!-- Begin Li's Breadcrumb Area -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('home')}}">Trang Chủ</a></li>
                <li class="active">Giới Thiệu Về DMX</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- about wrapper start -->
<div class="about-us-wrapper pt-60 pb-40">
    <div class="container">
        <div class="row">
            <!-- About Text Start -->
            <div class="col-lg-6 order-last order-lg-first">
                <div class="about-text-wrap">
                    <h4>GIỚI THIỆU VỀ HỆ THỐNG SIÊU THỊ ĐMX</h4>
                    
                    <p>Hàng hoá tại Siêu thị ĐMX vô cùng đa dạng, từ các nhóm hàng lớn như Tivi, Tủ Lạnh, Máy Giặt, Máy Lạnh… đến các nhóm hàng Gia dụng như: Nồi Cơm Điện, Bếp Ga, Bếp Điện Từ… ĐMX cũng kinh doanh các mặt hàng như: Điện Thoại, Máy Tính Bảng, Laptop, Phụ Kiện…</p>
                </div>
            </div>
            <!-- About Text End -->
            <!-- About Image Start -->
            <div class="col-lg-5 col-md-10">
                <div class="about-image-wrap">
                    <img class="img-full" src="{{asset('frontend/images/product/large-size/13.jpg')}}" alt="About Us" />
                </div>
            </div>
            <!-- About Image End -->
        </div>
    </div>
</div>
<!-- about wrapper end -->
<!-- Begin Counterup Area -->
<div class="counterup-area">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <!-- Begin Limupa Counter Area -->
                <div class="limupa-counter white-smoke-bg">
                    <div class="container">
                        <div class="counter-img">
                            <img src="images/about-us/icon/1.png" alt="">
                        </div>
                        <div class="counter-info">
                            <div class="counter-number">
                                <h3 class="counter">2169</h3>
                            </div>
                            <div class="counter-text">
                                <span>HAPPY CUSTOMERS</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- limupa Counter Area End Here -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Begin limupa Counter Area -->
                <div class="limupa-counter gray-bg">
                    <div class="counter-img">
                        <img src="images/about-us/icon/2.png" alt="">
                    </div>
                    <div class="counter-info">
                        <div class="counter-number">
                            <h3 class="counter">869</h3>
                        </div>
                        <div class="counter-text">
                            <span>AWARDS WINNED</span>
                        </div>
                    </div>
                </div>
                <!-- limupa Counter Area End Here -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Begin limupa Counter Area -->
                <div class="limupa-counter white-smoke-bg">
                    <div class="counter-img">
                        <img src="images/about-us/icon/3.png" alt="">
                    </div>
                    <div class="counter-info">
                        <div class="counter-number">
                            <h3 class="counter">689</h3>
                        </div>
                        <div class="counter-text">
                            <span>HOURS WORKED</span>
                        </div>
                    </div>
                </div>
                <!-- limupa Counter Area End Here -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Begin limupa Counter Area -->
                <div class="limupa-counter gray-bg">
                    <div class="counter-img">
                        <img src="images/about-us/icon/4.png" alt="">
                    </div>
                    <div class="counter-info">
                        <div class="counter-number">
                            <h3 class="counter">2169</h3>
                        </div>
                        <div class="counter-text">
                            <span>COMPLETE PROJECTS</span>
                        </div>
                    </div>
                </div>
                <!-- limupa Counter Area End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Counterup Area End Here -->
<!-- team area wrapper start -->
<div class="team-area pt-60 pt-sm-44">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="li-section-title capitalize mb-25">
                    <h2><span>our team</span></h2>
                </div>
            </div>
        </div> <!-- section title end -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                    <div class="team-thumb">
                        <img src="images/team/1.png" alt="Our Team Member">
                    </div>
                    <div class="team-content text-center">
                        <h3>Jonathan Scott</h3>
                        <p>IT Expert</p>
                        <a href="#">info@example.com</a>
                        <div class="team-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                    <div class="team-thumb">
                        <img src="images/team/2.png" alt="Our Team Member">
                    </div>
                    <div class="team-content text-center">
                        <h3>Oliver Bastin</h3>
                        <p>Web Designer</p>
                        <a href="#">info@example.com</a>
                        <div class="team-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member mb-30 mb-sm-60">
                    <div class="team-thumb">
                        <img src="images/team/3.png" alt="Our Team Member">
                    </div>
                    <div class="team-content text-center">
                        <h3>Erik Jonson</h3>
                        <p>Web Developer</p>
                        <a href="#">info@example.com</a>
                        <div class="team-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member mb-30 mb-sm-60 mb-xs-60">
                    <div class="team-thumb">
                        <img src="images/team/4.png" alt="Our Team Member">
                    </div>
                    <div class="team-content text-center">
                        <h3>Maria Mandy</h3>
                        <p>Marketing officer</p>
                        <a href="#">info@example.com</a>
                        <div class="team-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
        </div>
    </div>
</div>
<!-- team area wrapper end -->

@endsection