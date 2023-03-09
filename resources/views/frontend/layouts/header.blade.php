<div class="body-wrapper">
    <!-- Begin Header Area -->
    <header>
        <!-- Begin Header Top Area -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <!-- Begin Header Top Left Area -->
                    <div class="col-lg-3 col-md-4">
                        <div class="header-top-left">
                            <ul class="phone-wrap">
                                <li></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Top Left Area End Here -->
                    <!-- Begin Header Top Right Area -->
                    <div class="col-lg-9 col-md-8">
                        <div class="header-top-right">
                            <ul class="ht-menu">
                                @auth
                                    <li>
                                        <a href="#">Tài Khoản</a>
                                    </li>
                                    <li><a href="{{route('user.logout')}}">Đăng Xuất</a></li>
                                @else
                                    <li><a href="{{ route('login.form') }}">Đăng Nhập</a></li>
                                    <li><a href="{{route('register.form')}}">Đăng Ký</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                    <!-- Header Top Right Area End Here -->
                </div>
            </div>
        </div>
        <!-- Header Top Area End Here -->
        <!-- Begin Header Middle Area -->
        <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
            <div class="container">
                <div class="row">
                    @php
                        $settings = DB::table('settings')->get();
                    @endphp
                    <!-- Begin Header Logo Area -->
                    <div class="col-lg-3">
                        <div class="logo pb-sm-30 pb-xs-30">
                            <a href="{{route('home')}}">
                                @foreach ($settings as $setting)
                                    <img src="{{ $setting->logo }}" alt="{{ $setting->logo }}">
                                @endforeach
                            </a>
                        </div>
                    </div>
                    <!-- Header Logo Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                        <!-- Begin Header Middle Searchbox Area -->
                        <form action="{{ route('product.search') }}" method="POST" class="hm-searchbox">
                            @csrf
                            <select class="nice-select select-search-category">
                                @php
                                    $danhmuc = DB::table('categories')
                                        ->where('is_parent', 1)
                                        ->where('status', 'active')
                                        ->get();
                                @endphp
                                <option value="0">Tât cả</option>
                                @foreach ($danhmuc as $data)
                                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                                @endforeach

                            </select>
                            <input type="text" name="search" placeholder="Bạn tìm gì ...">
                            <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <!-- Header Middle Searchbox Area End Here -->
                        <!-- Begin Header Middle Right Area -->
                        <div class="header-middle-right">
                            <ul class="hm-menu">
                                <!-- Begin Header Middle Wishlist Area -->
                                <li class="hm-wishlist">
                                    @auth
                                    <a href="{{route('wishlist')}}">
                                        <span class="cart-item-count wishlist-item-count">{{Helper::wishlistCount()}}</span>
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                    @else
                                    <a href="{{route('wishlist')}}">
                                        <span class="cart-item-count wishlist-item-count">0</span>
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                    @endauth
                                </li>
                                <!-- Header Middle Wishlist Area End Here -->
                                <!-- Begin Header Mini Cart Area -->
                                <li class="hm-minicart">
                                    @auth
                                    <div class="hm-minicart-trigger">
                                        <span class="item-icon"></span>
                                        <span class="item-text">{{number_format(Helper::totalCartPrice()),2}} VNĐ
                                            <span class="cart-item-count">{{Helper::cartCount()}}</span>
                                        </span>
                                    </div>
                                    <div class="minicart">
                                        <ul class="minicart-product-list">
                                            @if(Helper::getAllProductFromCart())
                                            @foreach(Helper::getAllProductFromCart() as $cart)
                                            <li>
                                                @php
                                                    $photo=explode(',',$cart->product['photo']);
                                                @endphp
                                                <a href="{{route('product-detail',$cart->product['slug'])}}" class="minicart-product-image">
                                                    <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                </a>
                                                <div class="minicart-product-details">
                                                    <h6><a href="{{route('product-detail',$cart->product['slug'])}}">{{$cart->product['title']}}</a></h6>
                                                    <span>{{number_format($cart->price),2}}VNĐ x {{$cart->quantity}}</span>
                                                </div>
                                                <a href="{{route('cart-delete',$cart->id)}}" class="close" title="Remove">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                        <p class="minicart-total">Tổng tiền: <span>{{number_format(Helper::totalCartPrice()),2}}VNĐ</span></p>
                                        <div class="minicart-button">
                                            <a href="{{ route('cart') }}"
                                                class="li-button li-button-fullwidth li-button-dark">
                                                <span>Đến giỏ hàng</span>
                                            </a>
                                            <a href="{{ route('checkout') }}" class="li-button li-button-fullwidth">
                                                <span>Thanh toán</span>
                                            </a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="hm-minicart-trigger">
                                        <span class="item-icon"></span>
                                        <span class="item-text">0 VNĐ
                                            <span class="cart-item-count">0</span>
                                        </span>
                                    </div>
                                    @endauth
                                    <span></span>
                               
                                </li>
                                <!-- Header Mini Cart Area End Here -->
                            </ul>
                        </div>
                        <!-- Header Middle Right Area End Here -->
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
            </div>
        </div>
        <!-- Header Middle Area End Here -->
        <!-- Begin Header Bottom Area -->
        <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Begin Header Bottom Menu Area -->
                        <div class="hb-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                                    <li class="megamenu-holder"><a href="{{route('product-grids')}}">Sản Phẩm</a>
                                        {{-- <ul class="megamenu hb-megamenu">
                                            <li><a href="shop-left-sidebar.html">Shop Page Layout</a>
                                                <ul>
                                                    @php
                                                        $danhmuccha=DB::table('categories')->where('is_parent',1)->where('status','active')->get();
                                                    @endphp
                                                    @foreach($danhmuccha as $data)
                                                    <li><a href="{{route('product-cat',$data->slug)}}">{{$data->title}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                       
                                        </ul> --}}
                                    </li>
                                    <li class="dropdown-holder"><a href="#">Danh Mục</a>
                                        <ul class="hb-dropdown">
                                            @php
                                            $menu = App\Models\Category::getAllParentWithChild();
                                        @endphp
                                        @foreach($menu as $cat_info)
                                            <li class="sub-dropdown-holder"><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
                                                @if($cat_info->child_cat->count()>0)
                                                <ul class="hb-dropdown hb-sub-dropdown">
                                                    @foreach ($cat_info->child_cat as $sub_menu)
                                                    <li><a href="{{route('product-sub-cat',[$cat_info->slug, $sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
                                                    @endforeach
                                                    {{-- <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                                    <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                                    <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a></li> --}}
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                            {{-- <li class="sub-dropdown-holder"><a href="blog-list-left-sidebar.html">Blog
                                                    List View</a>
                                                <ul class="hb-dropdown hb-sub-dropdown">
                                                    <li><a href="blog-list.html">Blog List</a></li>
                                                    <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a>
                                                    </li>
                                                    <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a>
                                                    </li>
                                                </ul>
                                            </li> --}}
                                            {{-- <li class="sub-dropdown-holder"><a
                                                    href="blog-details-left-sidebar.html">Blog Details</a>
                                                <ul class="hb-dropdown hb-sub-dropdown">
                                                    <li><a href="blog-details-left-sidebar.html">Left Sidebar</a></li>
                                                    <li><a href="blog-details-right-sidebar.html">Right Sidebar</a>
                                                    </li>
                                                </ul>
                                            </li> --}}
                                            {{-- <li class="sub-dropdown-holder"><a href="blog-gallery-format.html">Blog
                                                    Format</a>
                                                <ul class="hb-dropdown hb-sub-dropdown">
                                                    <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                    <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                    <li><a href="blog-gallery-format.html">Blog Gallery Format</a></li>
                                                </ul>
                                            </li> --}}
                                        </ul>
                                    </li>
                                  
                                       
                                    </li>
                                    <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                                    <li><a href="{{route('orders')}}">Lịch Sử Đơn Hàng</a></li>
                                    <li><a href="{{route('blog')}}">Khuyến Mãi</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Bottom Menu Area End Here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom Area End Here -->
        <!-- Begin Mobile Menu Area -->
        <div class="mobile-menu-area d-lg-none d-xl-none col-12">
            <div class="container">
                <div class="row">
                    <div class="mobile-menu">
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu Area End Here -->
    </header>
    <!-- Header Area End Here -->
