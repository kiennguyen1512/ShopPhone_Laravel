@extends('frontend.layouts.master')
@section('title', 'Danh Sách Sản Phẩm')
@section('main-content')

    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Danh sách sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Content Wraper Area -->
    <div class="content-wraper pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Li's Banner Area -->
                    <div class="single-banner shop-page-banner">
                        <a href="#">
                            <img src="{{ asset('frontend/images/banner/logo1.png') }}" alt="Li's Static Banner">
                        </a>
                    </div>
                    <!-- Li's Banner Area End Here -->
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-30">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active" role="presentation"><a aria-selected="true" class="active show"
                                            data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i
                                                class="fa fa-th"></i></a></li>
                                    <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view"
                                            href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                            <div class="toolbar-amount">
                                <span>Có 103 Điện Thoại</span>
                            </div>
                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <p>Xếp theo:</p>
                                <select class="nice-select">
                                    <option value="trending">Nổi bật</option>
                                    <option value="sales">Giá từ thấp đến cao</option>
                                    <option value="sales">Giá từ cao đến thấp</option>
                                    <option value="rating">Giảm %</option>

                                </select>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="product-area shop-product-area">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            @php
                                                $photo = explode(',', $product->photo);
                                            @endphp
                                            <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="{{ route('product-detail', $product->slug) }}">
                                                            <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                                        </a>
                                                        <span class="sticker">New</span>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <a
                                                                        href="{{ route('product-cat', $product->slug) }}">{{ $product->cat_info->title }}</a>
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
                                                                                <li class="no-star"><i
                                                                                        class="fa fa-star-o"></i>
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
                                                                    $discount = $product->price - ($product->price * $product->discount) / 100;
                                                                @endphp
                                                                @if ($product->discount == 0)
                                                                    <span
                                                                        class="new-price">{{ number_format($product->price), 2 }}VNĐ</span>
                                                                @else
                                                                    <span
                                                                        class="new-price">{{ number_format($discount), 2 }}VNĐ</span>
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
                                                                <li><a href="#" title="quick view"
                                                                        class="quick-view-btn" data-toggle="modal"
                                                                        data-target="#{{ $product->id }}"><i
                                                                            class="fa fa-eye"></i></a></li>
                                                                <li><a class="links-details" href="wishlist.html"><i
                                                                            class="fa fa-heart-o"></i></a></li>
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
                            <div id="list-view" class="tab-pane product-list-view fade" role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        @foreach ($products as $data)
                                            @php
                                                $photo = explode(',', $data->photo);
                                            @endphp
                                            <div class="row product-layout-list">
                                                <div class="col-lg-3 col-md-5 ">
                                                    <div class="product-image">
                                                        <a href="{{ route('product-detail', $data->slug) }}">
                                                            <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                                        </a>
                                                        <span class="sticker">New</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-7">
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <a
                                                                        href="{{ route('product-cat', $data->slug) }}">{{ $data->cat_info->title }}</a>
                                                                </h5>
                                                                <div class="rating-box">
                                                                    @php
                                                                        $rate = DB::table('product_reviews')
                                                                            ->where('product_id', $data->id)
                                                                            ->avg('rate');
                                                                        $rate_count = DB::table('product_reviews')
                                                                            ->where('product_id', $data->id)
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
                                                                    href="{{ route('product-detail', $data->slug) }}">{{ $data->title }}</a>
                                                            </h4>
                                                            <div class="price-box">
                                                                @php
                                                                    $discount = $data->price - ($data->price * $data->discount) / 100;
                                                                @endphp
                                                                @if ($data->discount == 0)
                                                                    <span
                                                                        class="new-price">{{ number_format($data->price), 2 }}VNĐ</span>
                                                                @else
                                                                    <span
                                                                        class="new-price">{{ number_format($discount), 2 }}VNĐ</span>
                                                                    <span
                                                                        class="discount-percentage">-{{ $data->discount }}%</span>
                                                                @endif
                                                            </div>
                                                            <p>{!! $data->summary !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="shop-add-action mb-xs-30">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart"><a
                                                                    href="{{ route('add-to-cart', $data->slug) }}">Mua
                                                                    Ngay</a></li>
                                                            <li class="wishlist"><a
                                                                    href="{{ route('add-to-wishlist', $data->slug) }}"><i
                                                                        class="fa fa-heart-o"></i>Yêu Thích</a></li>
                                                            <li><a class="quick-view" data-toggle="modal"
                                                                    data-target="#{{ $data->id }}" href="#"><i
                                                                        class="fa fa-eye"></i>Quick view</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <p>Tất cả có 103 Sản Phẩm</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box">

                                            {{ $products->links() }}
                                            {{-- <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                          <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                        </li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wraper Area End Here -->


    @if ($products)
        @foreach ($products as $product)
            @php
                $photo = explode(',', $product->photo);
            @endphp
            <!-- Begin Quick View | Modal Area -->
            <div class="modal fade modal-wrapper" id="{{ $product->id }}">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                    <!-- Product Details Left -->
                                    <div class="product-details-left">
                                        <div class="product-details-images slider-navigation-1">
                                            @foreach ($photo as $data)
                                                <div class="lg-image">
                                                    <img src="{{ $data }}" alt="{{ $data }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">
                                            @foreach ($photo as $data1)
                                                <div class="sm-image"><img src="{{ $data1 }}"
                                                        alt="{{ $data1 }}"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!--// Product Details Left -->
                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2>{{ $product->title }}</h2>
                                            <span class="product-details-ref">Còn: {{ $product->stock }} Sản Phẩm</span>
                                            <div class="rating-box pt-20">
                                                <ul class="rating rating-with-review-item">
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
                                                    <li class="review-item"><a href="#">Read Review</a></li>
                                                    <li class="review-item"><a href="#">Write Review</a></li>
                                                </ul>
                                            </div>
                                            <div class="price-box pt-20">
                                                <span
                                                    class="new-price new-price-2">{{ number_format($product->price), 2 }}VNĐ</span>
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <span>{!! $product->summary !!}
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="product-variants">
                                                <div class="product__details__option__size">
                                                    @php
                                                        $color=explode(',',$product->size);
                                                    @endphp
                                                    <span>Màu Sắc:</span>
                                                    @foreach($color as $data)
                                                    <label for="xxl">{{$data}}
                                                        <input type="radio" id="{{$data}}">
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="single-add-to-cart">
                                                <form action="{{ route('single-add-to-cart') }}" method="POST"
                                                    class="cart-quantity">
                                                    @csrf
                                                    <div class="quantity">
                                                        <label>Số lượng</label>
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" value="1"
                                                                type="text">
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i>
                                                            </div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                                                </form>
                                            </div>
                                            <div class="product-additional-info pt-25">
                                                <a class="wishlist-btn"
                                                    href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                                        class="fa fa-heart-o"></i>Yêu Thích</a>
                                                <div class="product-social-sharing pt-25">
                                                    <ul>
                                                        <li class="facebook"><a href="#"><i
                                                                    class="fa fa-facebook"></i>Facebook</a></li>
                                                        <li class="twitter"><a href="#"><i
                                                                    class="fa fa-twitter"></i>Twitter</a></li>
                                                        <li class="google-plus"><a href="#"><i
                                                                    class="fa fa-google-plus"></i>Google +</a></li>
                                                        <li class="instagram"><a href="#"><i
                                                                    class="fa fa-instagram"></i>Instagram</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <!-- Quick View | Modal Area End Here -->
@endsection
