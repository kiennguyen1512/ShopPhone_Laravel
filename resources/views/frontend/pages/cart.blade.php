@extends('frontend.layouts.master')
@section('main-content')
@section('title','Giỏ hàng')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">Giỏ hàng của bạn</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
@if(Helper::getAllProductFromCart()->count()>0)
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('cart.update')}}" method="POST">
                    @csrf
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Thao tác</th>
                                    <th class="li-product-thumbnail">Hình ảnh</th>
                                    <th class="cart-product-name">Tên sản phẩm</th>
                                    <th class="li-product-price">Giá</th>
                                    <th class="li-product-quantity">Số lượng</th>
                                    <th class="li-product-subtotal">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach(Helper::getAllProductFromCart() as $key=>$data)
                                <tr>
                                    @php
                                        $photo=explode(',',$data->product['photo']);
                                    @endphp
                                    <td class="li-product-remove"><a href="{{route('cart-delete',$data->id)}}"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="{{route('product-detail',$data->product['slug'])}}"><img src="{{$photo[0]}}" style="height:80px ;" alt="{{$photo[0]}}"></a></td>
                                    <td class="li-product-name"><a href="{{route('product-detail',$data->product['slug'])}}">{{$data->product['title']}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{number_format($data['price']),2}}VNĐ</span></td>
                                    <td class="quantity">
                                        <label>Số Lượng</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" name="quant[{{$key}}]" value="{{$data->quantity}}" type="text">
                                            <input type="hidden" name="qty_id[]" value="{{$data->id}}">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format($data['amount']),2}}VNĐ</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Nhập mã khuyến mãi" type="text">
                                    <input class="button" name="apply_coupon" value="Áp Dụng" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Cập Nhật Giỏ Hàng" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                               
                                <ul>
                                    <li>Tổng Tiền <span>{{number_format(Helper::totalCartPrice()),2}}VNĐ</span></li>
                                </ul>
                                <a href="{{route('checkout')}}">Đặt Hàng</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Shopping Cart Area End-->
@else
<tr>
    <td class="text-center">
        <h3 style="text-align: center">Ban Không có sản phẩm nào trong giỏ hàng<a href="{{route('product-grids')}}" style="color:blue;">Về Trang Chủ</a></h3>
    </td>
</tr>
@endif
@endsection