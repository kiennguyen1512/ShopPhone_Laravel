@extends('frontend.layouts.master')
@section('title', 'Chi tiết sản phẩm')
@section('main-content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li class="active">{{ $product_detail->cat_info->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        @php
                            $photo = explode(',', $product_detail->photo);
                        @endphp
                        <div class="product-details-images slider-navigation-1">
                            @foreach ($photo as $data)
                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="{{ $data }}" data-gall="myGallery">
                                        <img src="{{ $data }}" alt="{{ $data }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            @foreach ($photo as $data)
                                <div class="sm-image"><img src="{{ $data }}" alt="$data"></div>
                            @endforeach
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2>{{ $product_detail->title }}</h2>
                            <span class="product-details-ref">Còn: {{ $product_detail->stock }}&emsp;Sản Phẩm</span>
                            <div class="rating-box pt-20">
                                <ul class="rating rating-with-review-item">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="review-item"><a href="#">Read Review</a></li>
                                    <li class="review-item"><a href="#">Write Review</a></li>
                                </ul>
                            </div>
                            <div class="price-box pt-20">
                                @php
                                    $priceDiscount = $product_detail->price - ($product_detail->price * $product_detail->discount) / 100;
                                @endphp
                                @if ($product_detail->discount == 0)
                                    <span
                                        class="new-price">{{ number_format($product_detail->price), 2 }}VNĐ</span>
                                @else
                                    <span class="new-price new-price-2">{{ number_format($priceDiscount), 2 }}VNĐ</span>
                                    <span class="old-price"
                                        style="font-size: 15px;text-decoration-line: line-through;color: rgb(12, 12, 1)">{{ number_format($product_detail->price), 2 }}VNĐ</span>
                                    <span class="discount-percentage" style="color: red">-{{ $product_detail->discount }}%</span>
                                @endif
                            </div>
                            <div class="product-desc">
                                <p>
                                    <span>{!! $product_detail->summary !!}
                                    </span>
                                </p>
                            </div>
                            <div class="product-variants">
                                {{-- <div class="produt-variants-size">
                                    <label>Màu sắc</label>
                                    @php
                                        $color = explode(',', $product_detail->size);
                                    @endphp
                                    <select class="nice-select">
                                        @foreach ($color as $key => $data)
                                            <option value="1" title="S" selected="selected">{{ $data }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="product__details__option">
                                    <div class="product__details__option__size">
                                        @php
                                            $color = explode(',', $product_detail->size);
                                        @endphp
                                        <span>Màu Sắc:</span>
                                        @foreach ($color as $data)
                                            <label for="xxl">{{ $data }}
                                                <input type="radio" id="{{ $data }}">
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="single-add-to-cart">
                                <form action="{{ route('single-add-to-cart') }}" method="POST" class="cart-quantity">
                                    @csrf
                                    <div class="quantity">
                                        <label>Số lượng</label>
                                        <div class="cart-plus-minus">
                                            <input type="hidden" id="inputSlug" value="{{ $product_detail->slug }}"
                                            name="slug">
                                        <input class="cart-plus-minus-box" id="inputQuant" name="quant[1]"
                                            value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                            <div class="product-additional-info pt-25">
                                <a class="wishlist-btn" href="{{ route('add-to-wishlist', $product_detail->slug) }}"><i
                                        class="fa fa-heart-o"></i>Thêm vào yêu thích</a>
                                <div class="product-social-sharing pt-25">
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                        </li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google
                                                +</a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                            <p>Bảo hành chính hãng điện thoại 1 năm tại các trung tâm bảo hành hãng</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-truck"></i>
                                            </div>
                                            <p>FREEship đơn hàng từ 300.000đ hoặc thành viên VÀNG
                                                Giao nhanh trong 2 giờ</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-exchange"></i>
                                            </div>
                                            <p> Hư gì đổi nấy 12 tháng tại 3280 siêu thị toàn quốc (miễn phí tháng đầu)</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    <!-- Begin Product Area -->
    <div class="product-area pt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a class="active" data-toggle="tab" href="#description"><span>Mô tả sản phẩm</span></a>
                            </li>
                            <li><a data-toggle="tab" href="#product-details"><span>Thông số</span></a></li>
                            <li><a data-toggle="tab" href="#reviews"><span>Đánh giá</span></a></li>
                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="description" class="tab-pane active show" role="tabpanel">
                    <div class="product-description">
                        <span>{!! $product_detail->description !!}</span>
                    </div>
                </div>
                <div id="product-details" class="tab-pane" role="tabpanel">
                    <div class="product-details-manufacturer">
                        <span>{!! $product_detail->specifications !!}</span>
                    </div>
                </div>
                <div id="reviews" class="tab-pane" role="tabpanel">
                    <div class="product-reviews">
                        <div class="product-details-comment-block">
                            {{-- <div class="comment-review">
                                <span>Grade</span>
                                <ul class="rating">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                </ul>
                            </div>
                            <div class="comment-author-infos pt-25">
                                <span>HTML 5</span>
                                <em>01-12-18</em>
                            </div>
                            <div class="comment-details">
                                <h4 class="title-block">Demo</h4>
                                <p>Plaza</p>
                            </div> --}}
                            @foreach ($product_detail['getReview'] as $data)
                                <div class="item-top">
                                    <p class="txtname">{{ $data->user_info['name'] }}</p>
                                </div>
                                <div class="item-rate">
                                    <ul class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($data->rate >= $i)
                                                <li><i class="fa fa-star-o"></i></li>
                                            @else
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            @endif
                                            @endfor
                                    </ul>
                                </div>

                                <div class="comment-content">
                                    <p class="cmt-txt">{{$data->review}}</p>
                                </div>
                            @endforeach
                            <div class="review-btn">
                                <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">
                                    Viết đánh giá</a>
                            </div>
                            <!-- Begin Quick View | Modal Area -->
                            <div class="modal fade modal-wrapper" id="mymodal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3 class="review-page-title">Viết Đánh Giá</h3>
                                            <div class="modal-inner-area row">
                                                <div class="col-lg-6">
                                                    <div class="li-review-product">
                                                        @php
                                                            $photo = explode(',', $product_detail->photo);
                                                        @endphp
                                                        <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                                        <div class="li-review-product-desc">
                                                            <p class="li-product-name">{!! $product_detail->title !!}
                                                            </p>
                                                            <p>
                                                                <span>{!! $product_detail->summary !!}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="li-review-content">
                                                        <!-- Begin Feedback Area -->
                                                        <div class="feedback-area">
                                                            <div class="feedback">
                                                                <h3 class="feedback-title">Phản hồi cho chúng tôi sự hài
                                                                    lòng của bạn</h3>
                                                                <form
                                                                    action="{{ route('review.store', $product_detail->slug) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <p class="your-opinion">
                                                                        <label>Sự hài lòng của bạn</label>
                                                                        <span>
                                                                            <select name="rate" class="star-rating">
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                            </select>
                                                                        </span>
                                                                    </p>
                                                                    <p class="feedback-form">
                                                                        <label for="feedback">Nhận xét của bạn</label>
                                                                        <textarea id="feedback" name="review" cols="45" rows="8" aria-required="true"></textarea>
                                                                    </p>
                                                                    <div class="feedback-input">
                                                                        <div class="feedback-btn pb-15">
                                                                            {{-- <a href="#" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">Close</a> --}}
                                                                            <button class="btn btn-danger"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">Đóng</button>
                                                                            <button class="btn btn-primary"
                                                                                type="submit">Gủi đánh giá</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Feedback Area End Here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Quick View | Modal Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->
    <!-- Begin Li's Laptop Product Area -->
    <section class="product-area li-laptop-product pt-30 pb-50">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Sản phẩm liên quan:</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach ($product_related as $products)
                                @php
                                    $photo = explode(',', $products->photo);
                                @endphp
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="{{ route('product-detail', $products->slug) }}">
                                                <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a
                                                            href="product-details.html">{{ $products->cat_info->title }}</a>
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
                                                <h4><a class="product_name"
                                                        href="{{ route('product-detail', $products->slug) }}">{{ $products->title }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span
                                                        class="new-price">{{ number_format($products->price), 2 }}VNĐ</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a
                                                            href="{{ route('add-to-cart', $products->slug) }}">Mua
                                                            Ngay</a>
                                                    </li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#{{ $products->id }}"><i
                                                                class="fa fa-eye"></i></a></li>
                                                    <li><a class="links-details"
                                                            href="{{ route('add-to-wishlist', $products->slug) }}"><i
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
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Laptop Product Area End Here -->
    @if ($product_related)
        @foreach ($product_related as $key => $product)
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
                                            @foreach ($photo as $data)
                                                <div class="sm-image"><img src="{{ $data }}"
                                                        alt="{{ $data }}"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!--// Product Details Left -->
                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2>{{ $product->title }}</h2>
                                            <span class="product-details-ref">Còn: {{ $product->stock }} &emsp;Sản
                                                Phẩm</span>
                                            <div class="rating-box pt-20">
                                                <ul class="rating rating-with-review-item">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="review-item"><a href="#">Read Review</a></li>
                                                    <li class="review-item"><a href="#">Write Review</a></li>
                                                </ul>
                                            </div>
                                            <div class="price-box pt-20">
                                                @php
                                                    $priceDiscount = $product->price - ($product->price * $product->discount) / 100;
                                                @endphp
                                                @if ($product->discount == 0)
                                                    <span
                                                        class="new-price new-price-2">{{ number_format($product->price), 2 }}
                                                        VNĐ</span>
                                                @else
                                                    <span
                                                        class="new-price new-price-2">{{ number_format($priceDiscount), 2 }}
                                                        VNĐ</span>
                                                    <br />
                                                    <span class="old-price"
                                                        style="text-decoration-line:line-through">{{ number_format($product->price), 2 }}
                                                        VNĐ VNĐ</span>
                                                @endif
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <span>{!! $product->summary !!}
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="product-variants">
                                                {{-- <div class="produt-variants-size">
                                        <label>Chọn màu</label>
                                        <select class="nice-select">
                                            @php
                                                $color=explode(',',$product->size);
                                            @endphp
                                            @foreach ($color as $colors)
                                            <option value="1" title="S" selected="selected">{{$colors}}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div> --}}
                                                <div class="product__details__option">
                                                    <div class="product__details__option__size">
                                                        @php
                                                            $color = explode(',', $product->size);
                                                        @endphp
                                                        <span>Màu Sắc:</span>
                                                        @foreach ($color as $data)
                                                            <label for="xxl">{{ $data }}
                                                                <input type="radio" id="{{ $data }}">
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-add-to-cart">
                                                <form action="{{ route('single-add-to-cart') }}" method="POST"
                                                    class="cart-quantity">
                                                    @csrf
                                                    <div class="quantity">
                                                        <label>Số lượng</label>
                                                        <div class="cart-plus-minus">
                                                            <input type="hidden" name="slug"
                                                                value="{{ $product->slug }}">
                                                            <input class="cart-plus-minus-box" name="quant[1]"
                                                                value="1" type="text">
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
                                                        class="fa fa-heart-o"></i>Thêm vào yêu thích</a>
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
            <!-- Quick View | Modal Area End Here -->
        @endforeach
    @endif
@endsection

@push('styles')
    <style>

    </style>
@endpush
