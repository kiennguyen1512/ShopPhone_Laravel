@if($product_lists)
    @foreach($product_lists as $key=>$product)
    @php
        $photo=explode(',',$product->photo);
    @endphp
<!-- Begin Quick View | Modal Area -->
<div class="modal fade modal-wrapper" id="{{$product->id}}" >
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
                                @foreach($photo as $data)
                                <div class="lg-image">
                                    <img src="{{$data}}" alt="{{$data}}">
                                </div>
                                @endforeach
                               
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">     
                                @foreach($photo as $data)                                   
                                <div class="sm-image"><img src="{{$data}}" alt="{{$data}}"></div>
                                @endforeach
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2>{{$product->title}}</h2>
                                <span class="product-details-ref">Còn: {{$product->stock}} &emsp;Sản Phẩm</span>
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        @php
                                        $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                        @endphp
                                        @for($i=1;$i<=5;$i++)
                                        @if($rate>=$i)
                                        <li><i class="fa fa-star-o"></i></li>
                                        @else
                                        {{-- <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li> --}}
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        @endif
                                        @endfor
                                        <li class="review-item"><a href="#">Read Review</a></li>
                                        <li class="review-item"><a href="#">Viết Đánh Giá</a></li>
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    @php
                                        $priceDiscount=($product->price-($product->price*$product->discount)/100);
                                    @endphp
                                    @if($product->discount==0)
                                    <span class="new-price new-price-2">{{number_format($product->price),2}} VNĐ</span>
                                    @else
                                    <span class="new-price new-price-2">{{number_format($priceDiscount),2}} VNĐ</span>
                                    <br/>
                                    <span class="old-price" style="text-decoration-line:line-through">{{number_format($product->price),2}} VNĐ VNĐ</span>
                                    @endif
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span>{!!$product->summary !!}
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
                                            @foreach($color as $colors)
                                            <option value="1" title="S" selected="selected">{{$colors}}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div> --}}
                                    <div class="product__details__option">
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
                                </div>
                                <div class="single-add-to-cart">
                                    <form action="{{route('single-add-to-cart')}}" method="POST" class="cart-quantity">
                                        @csrf
                                        <div class="quantity">
                                            <label>Số lượng</label>
                                            <div class="cart-plus-minus">
                                                <input type="hidden" name="slug" value="{{$product->slug}}">
                                                <input class="cart-plus-minus-box" name="quant[1]" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                    <a class="wishlist-btn" href="{{route('add-to-wishlist',$product->slug)}}"><i class="fa fa-heart-o"></i>Thêm vào yêu thích</a>
                                    <div class="product-social-sharing pt-25">
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                            <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
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