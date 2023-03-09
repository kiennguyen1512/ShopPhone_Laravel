@extends('frontend.layouts.master')
@section('main-content')
@section('title', 'Thanh toán')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                <li class="active">Đặt Hàng</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="{{route('product.order')}}" method="POST">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Thông Tin Giao Hàng</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Họ Tên <span class="required">*</span></label>
                                    <input name="hoten" placeholder="" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Số Điện Thoại <span class="required">*</span></label>
                                    <input name="dienthoai" placeholder="" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email <span class="required">*</span></label>
                                    <input name="email" placeholder="" type="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Ghi Chú</label>
                                    <input name="ghichu" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Tỉnh-Thành Phố<span class="required" >*</span></label>
                                    <input name="address" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Quận(Huyện)<span class="required">*</span></label>
                                    <input name="address1" placeholder="" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phường(Xã)<span class="required">*</span></label>
                                    <input name="address2" placeholder="" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ chi tiết<span class="required">*</span></label>
                                    <input name="address3" type="text">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="different-address">
                            <div class="ship-different-title">
                                <h3>
                                    <label>Ship to a different address?</label>
                                    <input id="ship-box" type="checkbox">
                                </h3>
                            </div>
                            <div id="ship-box-info" class="row">
                                <div class="col-md-12">
                                    <div class="country-select clearfix">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="nice-select wide">
                                          <option data-display="Bangladesh">Bangladesh</option>
                                          <option value="uk">London</option>
                                          <option value="rou">Romania</option>
                                          <option value="fr">French</option>
                                          <option value="de">Germany</option>
                                          <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Company Name</label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Phone  <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Order Notes</label>
                                    <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Đơn Hàng Của Bạn</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Sản Phẩm</th>
                                    <th class="cart-product-total">Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Helper::getAllProductFromCart() as $key => $data)
                                    <tr class="cart_item">
                                        <td class="cart-product-name">{{ $data->product['title'] }}<strong
                                                class="product-quantity"> × {{ $data->quantity }}</strong></td>
                                        <td class="cart-product-total"><span
                                                class="amount">{{ number_format($data->price), 2 }}VNĐ</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Tạm Tính</th>
                                    <td><span class="amount" data-price="{{Helper::totalCartPrice()}}">{{ number_format(Helper::totalCartPrice()), 2 }}VNĐ</span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    @php
                                        $total_amount = Helper::totalCartPrice();
                                        if (session('coupon')) {
                                            $total_amount = $total_amount - session('coupon')['value'];
                                        }
                                    @endphp
                                    <th>Tổng Thanh Toán</th>
                                    @if(session('coupon'))
                                    <td><strong><span class="amount"  id="order_total_price">{{number_format($total_amount),2}}VNĐ</span></strong></td>
                                    @else
                                    <td><strong><span class="amount"  id="order_total_price">{{number_format($total_amount),2}}VNĐ</span></strong></td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="#payment-1">
                                        <h5 class="panel-title">
                                            <a class="" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Tiền Mặt
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-2">
                                        <h5 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                PayPal
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-3">
                                        <h5 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                MoMo
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-button-payment">
                                <input value="Đặt Hàng" type="submit">
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout Area End-->
@endsection
@push('styles')
<style>
    li.shipping {
        display: inline-flex;
        width: 100%;
        font-size: 14px;
    }

    li.shipping .input-group-icon {
        width: 100%;
        margin-left: 10px;
    }

    .input-group-icon .icon {
        position: absolute;
        left: 20px;
        top: 0;
        line-height: 40px;
        z-index: 3;
    }

    .form-select {
        height: 30px;
        width: 100%;
    }

    .form-select .nice-select {
        border: none;
        border-radius: 0px;
        height: 40px;
        background: #f6f6f6 !important;
        padding-left: 45px;
        padding-right: 40px;
        width: 100%;
    }

    .form-select .nice-select::after {
        top: 14px;
    }
</style>
@endpush
@push('scripts')
<script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("select.select2").select2();
    });
    $('select.nice-select').niceSelect();
</script>
<script>
    function showMe(box) {
        var checkbox = document.getElementById('shipping').style.display;
        var vis = 'none';
        if (checkbox == "none") {
            vis = 'block';
        }
        if (checkbox == "block") {
            vis = "none";
        }
        document.getElementById(box).style.display = vis;
    }
</script>
<script>
    $(document).ready(function() {
        $('.shipping select[name=shipping]').change(function() {
            let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
            let subtotal = parseFloat($('.order_subtotal').data('price'));
            let coupon = parseFloat($('.coupon_price').data('price')) || 0;
            $('#order_total_price span').text((subtotal + cost - coupon).toFixed(2) + 'VNĐ');
        });

    });
</script>
@endpush
