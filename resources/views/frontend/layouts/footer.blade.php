  <!-- Begin Footer Area -->
  <div class="footer">
    <!-- Begin Footer Static Top Area -->
    <div class="footer-static-top">
        <div class="container">
            <!-- Begin Footer Shipping Area -->
            <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                <div class="row">
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{asset('frontend/images/shipping-icon/1.png')}}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>Giao hàng miễn phí</h2>
                                <p>Và trả lại miễn phí. Xem thanh toán để biết ngày giao hàng.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{asset('frontend/images/shipping-icon/2.png')}}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>Thanh Toán An Toàn</h2>
                                <p>Thanh toán bằng các phương thức thanh toán an toàn và phổ biến nhất thế giới.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{asset('frontend/images/shipping-icon/3.png')}}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>Mua Sắm Trực Tuyến</h2>
                                <p>Bảo vệ người mua của chúng tôi bao gồm việc mua hàng của bạn từ khi nhấp chuột đến khi giao hàng.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{asset('frontend/images/shipping-icon/4.png')}}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>Hỗ Trợ 24/7</h2>
                                <p>Có một câu hỏi? Gọi cho Chuyên gia hoặc trò chuyện trực tuyến.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                </div>
            </div>
            <!-- Footer Shipping Area End Here -->
        </div>
    </div>
    <!-- Footer Static Top Area End Here -->
 <!-- Begin Footer Static Middle Area -->
 <div class="footer-static-middle">
    <div class="container">
        <div class="footer-logo-wrap pt-50 pb-35">
            <div class="row">
                <!-- Begin Footer Logo Area -->
                <div class="col-lg-4 col-md-6">
                    @php
                        $footer=DB::table('settings')->get();
                    @endphp
                    <div class="footer-logo">
                        @foreach($footer as $data)
                        <img src="{{$data->photo}}" alt="{{$data->photo}}">
                        <p class="info">
                           {!!$data->description!!}
                        </p>
                    </div>
                    <ul class="des">
                        <li>
                            <span>Địa chỉ: </span>
                           {{$data->address}}
                        </li>
                        <li>
                            <span>Điện thoại: </span>
                            <a href="#">{{$data->phone}}</a>
                        </li>
                        <li>
                            <span>Email: </span>
                            <a href="{{$data->email}}">{{$data->email}}</a>
                        </li>
                    </ul>
                    @endforeach
                </div>
                <!-- Footer Logo Area End Here -->
                <!-- Begin Footer Block Area -->
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer-block">
                        <h3 class="footer-block-title">Giới Thiệu Công Ty</h3>
                        <ul>
                            <li><a href="#">Tuyển Dụng</a></li>
                            <li><a href="#">Gủi Góp Ý,Khiếu Nại</a></li>
                            <li><a href="#">Tìm Siêu Thị</a></li>
                            <li><a href="#">Xem Trên Mobile</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Footer Block Area End Here -->
                <!-- Begin Footer Block Area -->
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer-block">
                        <h3 class="footer-block-title">Tổng đài hỗ trợ</h3>
                        <ul>
                            <li><a href="#">Gọi mua: 1800000</a></li>
                            <li><a href="#">Kỹ thuật: 1800001</a></li>
                            <li><a href="#">Khiếu nại: 1800002</a></li>
                            <li><a href="#">Bảo Hành: 18000003</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Footer Block Area End Here -->
                <!-- Begin Footer Block Area -->
                <div class="col-lg-4">
                    <div class="footer-block">
                        <h3 class="footer-block-title">Follow Us</h3>
                        <ul class="social-link">
                            <li class="twitter">
                                <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="rss">
                                <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="RSS">
                                    <i class="fa fa-rss"></i>
                                </a>
                            </li>
                            <li class="google-plus">
                                <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="facebook">
                                <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="youtube">
                                <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                            <li class="instagram">
                                <a href="https://www.instagram.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Begin Footer Newsletter Area -->
                    <div class="footer-newsletter">
                        <h4>Sign up to newsletter</h4>
                        <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate>
                           <div id="mc_embed_signup_scroll">
                              <div id="mc-form" class="mc-form subscribe-form form-group" >
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email" />
                                <button  class="btn" id="mc-submit">Subscribe</button>
                              </div>
                           </div>
                        </form>
                    </div>
                    <!-- Footer Newsletter Area End Here -->
                </div>
                <!-- Footer Block Area End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Footer Static Middle Area End Here -->
<!-- Begin Footer Static Bottom Area -->
<div class="footer-static-bottom pt-55 pb-55">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Footer Links Area -->
                <div class="footer-links">
                    <ul>
                        <li><a href="#">© 2022. Công ty cổ phần Thế Giới Di Động. GPDKKD:  
                            Địa chỉ: TP.Hồ Chí Minh. Điện thoại: 0343754517. Email: admin@gmail.com Chịu trách nhiệm nội dung: NQK</a></li>
                        
                    </ul>
                </div>
                <!-- Footer Links Area End Here -->
                <!-- Begin Footer Payment Area -->
                <div class="copyright text-center">
                    <a href="#">
                        <img src="{{asset('frontend/images/payment/1.png')}}" alt="">
                    </a>
                </div>
                <!-- Footer Payment Area End Here -->
                <!-- Begin Copyright Area -->
               
                <!-- Copyright Area End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Footer Static Bottom Area End Here -->
</div>
<!-- Footer Area End Here -->