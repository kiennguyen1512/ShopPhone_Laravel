@extends('frontend.layouts.master')
@section('title','Yêu thích')
@section('main-content')
 <!-- Begin Li's Breadcrumb Area -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">Yêu Thích</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Wishlist Area Strat-->
@if(Helper::getAllProductFromWishlist()->count()>0)
<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Xóa</th>
                                    <th class="li-product-thumbnail">Hình Ảnh</th>
                                    <th class="cart-product-name">Tên Sản Phẩm</th>
                                    <th class="li-product-price">Giá</th>
                                    <th class="li-product-stock-status">Trạng Thái</th>
                                    <th class="li-product-add-cart">Mua Ngay</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Helper::getAllProductFromWishlist())
                                @foreach(Helper::getAllProductFromWishlist() as $key=>$data)
                                @php
                                    $photo=explode(',',$data->product['photo']);
                                @endphp
                                <tr>
                                    <td class="li-product-remove"><a href="{{route('wishlist-delete',$data->id)}}"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="{{route('product-detail',$data->product['slug'])}}"><img src="{{$photo[0]}}" style="height: 100px" alt="{{$photo[0]}}"></a></td>
                                    <td class="li-product-name"><a href="#">{{$data->product['title']}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{number_format($data->product['price']),2}}VNĐ</span></td>
                                    @if((int)$data->product->stock>0)
                                    <td class="li-product-stock-status"><span class="in-stock">Còn Hàng</span></td>
                                    @else
                                    <td class="li-product-stock-status"><span class="out-stock">Hết Hàng</span></td>
                                    @endif
                                    <td class="li-product-add-cart"><a href="#">Thêm vào giỏ hàng</a></td>
                                </tr>
                                @endforeach
                                @else
                                <td><span>Không có dữ liệu</span></td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Wishlist Area End-->
@else
<h3 style="text-align: center"> Bạn chưa có sản phẩm yêu thích</h3>
@endif
@endsection