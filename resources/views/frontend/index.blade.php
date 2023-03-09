@extends('frontend.layouts.master')
@section('main-content')
@section('title', 'Trang Chủ')

<!-- Begin Slider With Banner Area -->
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8">
                <div class="slider-area">
                    <div class="slider-active owl-carousel">
                        <!-- Begin Single Slide Area -->
                        @foreach ($banners as $data)
                            <div class="single-slide align-center-left  animation-style-01 bg-1"
                                style="background-image: url({{ $data->photo }})">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Begin Li Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                @foreach ($banner_child as $data)
                    <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                        <a href="#">
                            <img src="{{ $data->photo }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Li Banner Area End Here -->
        </div>
    </div>
</div>
<!-- Slider With Banner Area End Here -->
<!-- Begin Product Area -->
<div class="product-area pt-60 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Tất cả</span></a></li>
                        @php
                            $danhmuc = DB::table('categories')
                                ->where('is_parent', 1)
                                ->where('status', 'active')
                                ->limit(5)
                                ->get();
                        @endphp
                        @foreach ($danhmuc as $danhmucs)
                            <li><a data-toggle="tab" class="danhmuc" data-id="li-new-product-{{ $danhmucs->id }}"
                                    href="#li-bestseller-product-{{ $danhmucs->id }}"><span>{{ $danhmucs->title }}</span></a>
                            </li>
                        @endforeach
                        {{-- <li><a data-toggle="tab" href="#li-featured-product"><span>Featured Products</span></a></li> --}}
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($product_lists as $product)
                            @php
                                $photo = explode(',', $product->photo);
                            @endphp
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ route('product-detail', $product->slug) }}">
                                            <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                        </a>
                                        <span class="sticker">{{ $product->condition }}</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="#">{{ $product->cat_info->title }}</a>
                                                </h5>
                                                <div class="rating-box">
                                                    @php
                                                        $rate = DB::table('product_reviews')
                                                            ->where('product_id', $product->id)
                                                            ->avg('rate');
                                                    @endphp
                                                    <ul class="rating">
                                                        @for ($i = 1; $i < -5; $i++)
                                                            @if ($rate >= $i)
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                {{-- <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li> --}}
                                                            @else
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                {{-- <li class="no-star"><i class="fa fa-star-o"></i></li> --}}
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name"
                                                    href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                            </h4>
                                            <div class="price-box">
                                                @php
                                                    $price = $product->price - ($product->price * $product->discount) / 100;
                                                @endphp
                                                @if ($product->discount == 0)
                                                    <span
                                                        class="new-price new-price-2">{{ number_format($product->price), 2 }}VNĐ</span>
                                                @else
                                                    <span
                                                        class="new-price new-price-2">{{ number_format($price), 2 }}VNĐ</span>
                                                    <span class="discount-percentage">-{{ $product->discount }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a
                                                        href="{{ route('add-to-cart', $product->slug) }}">Mua Ngay</a>
                                                </li>
                                                <li><a class="links-details"
                                                        href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn"
                                                        data-toggle="modal" data-target="#{{ $product->id }}"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @foreach ($danhmuc as $data)
                <div id="li-bestseller-product-{{ $data->id }}" class="tab-pane show" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach ($product_lists as $product)
                                @if ($data->id == $product->cat_id)
                                    @php
                                        $photo = explode(',', $product->photo);
                                    @endphp
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ route('product-detail', $product->slug) }}">
                                                    <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                                </a>
                                                <span class="sticker">{{ $product->condition }}</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                @php
                                                                    $rate = DB::table('product_reviews')
                                                                        ->where('product_id', $product->id)
                                                                        ->avg('rate');
                                                                    $rate_count = DB::table('product_reviews')
                                                                        ->where('product_id', $product->id)
                                                                        ->count();
                                                                @endphp
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($rate >= $i)
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    @else
                                                                        <li class="no-star"><i class="fa fa-star-o"></i>
                                                                        </li>
                                                                    @endif
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name"
                                                            href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                                    </h4>
                                                    <div class="price-box">
                                                        @php
                                                            $price = $product->price - ($product->price * $product->discount) / 100;
                                                        @endphp
                                                        @if ($product->discount == 0)
                                                            <span
                                                                class="new-price new-price-2">{{ number_format($product->price), 2 }}VNĐ</span>
                                                        @else
                                                            <span
                                                                class="new-price new-price-2">{{ number_format($price), 2 }}VNĐ</span>
                                                            <span
                                                                class="discount-percentage">-{{ $product->discount }}%</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a
                                                                href="{{ route('add-to-cart', $product->slug) }}">Mua
                                                                Ngay</a></li>
                                                        <li><a class="links-details"
                                                                href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                                                    class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="#" title="quick view"
                                                                class="quick-view-btn" data-toggle="modal"
                                                                data-target="#{{ $product->id }}"><i
                                                                    class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Static Banner Area -->
<div class="li-static-banner">
    <div class="container">
        <div class="row">
            @php
                $slider = DB::table('banners')
                    ->where('status', 'active')
                    ->limit(3)
                    ->get();
            @endphp
            @foreach ($slider as $banner)
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                    <div class="single-banner">
                        <a href="#">
                            <img src="{{ $banner->photo }}" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Li's Static Banner Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Danh Mục Nổi
                            Bật</span>
                    </h2>
                    <ul class="li-sub-category-list">
                        <li class="active"><a href="#">Prime Video</a></li>
                        <li><a href="#">Computers</a></li>
                        <li><a href="#{Ơ}}">Electronics</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($category_lists as $data)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ route('product-cat', $data->slug) }}">
                                            <img src="{{ $data->photo }}" alt="{{ $data }}">
                                        </a>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a
                                                        href="{{ route('product-cat', $data->slug) }}">{{ $data->title }}</a>
                                                </h5>
                                                <div class="rating-box">
                                                </div>
                                            </div>
                                            {{-- <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4> --}}

                                        </div>

                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Laptop Product Area End Here -->
<!-- Begin Li's TV & Audio Product Area -->
{{-- <section class="product-area li-laptop-product li-tv-audio-product pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>TV & Audio</span>
                    </h2>
                    <ul class="li-sub-category-list">
                        <li class="active"><a href="shop-left-sidebar.html">Chamcham</a></li>
                        <li><a href="shop-left-sidebar.html">Sanai</a></li>
                        <li><a href="shop-left-sidebar.html">Meito</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/3.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium
                                                dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn"
                                                    data-toggle="modal" data-target="#exampleModalCenter"><i
                                                        class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section> --}}
<!-- Li's TV & Audio Product Area End Here -->
<!-- Begin Li's Static Home Area -->
<div class="li-static-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Static Home Image Area -->
                <div class="li-static-home-image"
                    style="background-image: url({{ asset('frontend/images/banner/Banner-Bighero-seasonal-desk-min-10.8-1920x450.jpg') }})">
                </div>
                <!-- Li's Static Home Image Area End Here -->
                <!-- Begin Li's Static Home Content Area -->

                <!-- Li's Static Home Content Area End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Li's Static Home Area End Here -->
<!-- Begin Li's Trending Product Area -->
<section class="product-area li-trending-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Tab Menu Area -->
            <div class="col-lg-12">
                <div class="li-product-tab li-trending-product-tab">
                    <h2>
                        <span>Gợi Ý Hôm Nay</span>
                    </h2>
                    <ul class="nav li-product-menu li-trending-product-menu">
                        <li><a class="active" data-toggle="tab" href="#home1"><span>Cho Bạn</span></a></li>
                        <li><a data-toggle="tab" href="#home2"><span>Xả Hàng Giảm Sốc</span></a></li>
                        <li><a data-toggle="tab" href="#home3"><span>Chỉ Giảm Online</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
                <div class="tab-content li-tab-content li-trending-product-content">

                    <div id="home1" class="tab-pane show fade in active">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach ($featured as $product)
                                    @php
                                        $photo = explode(',', $product->photo);
                                    @endphp
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                                </a>
                                                @if ($product->condition == 'default')
                                                @else
                                                    <span class="sticker">{{ $product->condition }}</span>
                                                @endif
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a
                                                                href="{{ route('product-detail', $product->slug) }}">{{ $product->cat_info->title }}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            @php
                                                                $rate = DB::table('product_reviews')
                                                                    ->where('product_id', $product->id)
                                                                    ->avg('rate');
                                                                $rate_count = DB::table('product_reviews')
                                                                    ->where('product_id', $product->id)
                                                                    ->count();
                                                            @endphp
                                                            <ul class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($rate >= $i)
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    @else
                                                                        <li class="no-star"><i
                                                                                class="fa fa-star-o"></i></li>
                                                                    @endif
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name"
                                                            href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                                    </h4>
                                                    <div class="price-box">
                                                        @if ($product->discount == 0)
                                                            <span
                                                                class="new-price new-price-2">{{ number_format($product->price), 2 }}VNĐ</span>
                                                        @else
                                                            @php
                                                                $discount = $product->price - ($product->price * $product->discount) / 100;
                                                            @endphp
                                                            <span
                                                                class="new-price new-price-2">{{ number_format($discount), 2 }}VNĐ</span>
                                                            <span
                                                                class="discount-percentage">-{{ $product->discount }}%</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a
                                                                href="{{ route('add-to-cart', $product->slug) }}">Mua
                                                                Ngay</a></li>
                                                        <li><a class="links-details"
                                                                href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                                                    class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="#" title="quick view"
                                                                class="quick-view-btn" data-toggle="modal"
                                                                data-target="#{{ $product->id }}"><i
                                                                    class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div id="home2" class="tab-pane fade">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/11.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/7.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug Today is a
                                                        good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/9.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/5.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug Today is a
                                                        good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/7.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/5.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug Today is a
                                                        good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="home3" class="tab-pane fade">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/3.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/7.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug Today is a
                                                        good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/9.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/1.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug Today is a
                                                        good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/11.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="images/product/large-size/9.jpg" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug Today is a
                                                        good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Menu Content Area End Here -->
            </div>
            <!-- Tab Menu Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Trending Product Area End Here -->
<!-- Begin Li's Trendding Products Area -->
<section class="product-area li-laptop-product li-trendding-products best-sellers pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Khuyến Mãi Lớn</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($bestseller as $product)
                            @php
                                $photo = explode(',', $product->photo);
                            @endphp
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                        </a>
                                        <span class="sticker">{{ $product->condition }}</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a
                                                        href="{{ route('product-cat', $product->id) }}">{{ $product->cat_info->title }}</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        @php
                                                            $rate = DB::table('product_reviews')
                                                                ->where('product_id', $product->id)
                                                                ->avg('rate');
                                                            $rate_count = DB::table('product_reviews')
                                                                ->where('product_id', $product->id)
                                                                ->count();
                                                        @endphp
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($rate >= $i)
                                                                <li><i class="fa fa-star-o"></i></li>
                                                            @else
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name"
                                                    href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                            </h4>
                                            <div class="price-box">
                                                @php
                                                    $priceDiscount = $product->price - ($product->price * $product->discount) / 100;
                                                @endphp
                                                @if ($product->discount == 0)
                                                    <span
                                                        class="new-price new-price-2">{{ number_format($product->price), 2 }}VNĐ</span>
                                                @else
                                                    <span
                                                        class="new-price new-price-2">{{ number_format($product->price), 2 }}VNĐ</span>
                                                    <span
                                                        class="discount-percentage">-{{ $product->discount }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a
                                                        href="{{ route('add-to-cart', $product->slug) }}">Mua Ngay</a>
                                                </li>
                                                <li><a class="links-details"
                                                        href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn"
                                                        data-toggle="modal" data-target="#{{ $product->id }}"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Trendding Products Area End Here -->

{{-- <script>
    const danhmucs = document.querySelectorAll('.danhmuc');
    Array.from(danhmucs).forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            let idDanhMuc = e.target.dataset.id;
            let listPante = document.querySelectorAll('.tab-pane');
            Array.from(listPante).forEach(item => {
                item.classList.remove('active')
            })
            document.getElementById(idDanhMuc).classList.add('active')
        })
    })
</script> --}}
@include('frontend.layouts.quick-view')
@endsection
