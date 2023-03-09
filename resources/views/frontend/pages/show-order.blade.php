@extends('frontend.layouts.master')
@section('main-content')
@section('title','Đơn hàng của bạn')

 <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">Thông tin đơn hàng</h4>
              <table class="table">
                @foreach($order as $orders)
                    <tr class="">
                        <td>Mã Hóa đơn</td>
                        <td>{{$orders->mahd}}</td>
                    </tr>
                    <tr>
                        <td>Ngày Lập</td>
                        <td>{{$orders->ngaylap}}</td>
                    </tr>
                    <tr>
                        <td>Họ Tên</td>
                        <td>{{$orders->hoten}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$orders->email}}</td>
                    </tr>
                    <tr>
                        <td>Điện Thoại</td>
                        <td>{{$orders->dienthoai}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ nhận hàng</td>
                        <td>{{$orders->diachi}}</td>
                    </tr>
                    <tr>
                        <td>Tổng Thanh Toán</td>
                        <td>{{number_format($orders->tongtien),2}}VNĐ</td>
                    </tr>
                    <tr>
                        <td>Phương thức thanh toán</td>
                        <td>@if($orders->httt=='1') Thanh Toán Khi Nhận Hàng @else Paypal @endif</td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>
                            @if($orders->trangthai==0)
                            Đang Chờ Xác Nhận
                            @elseif($orders->trangthai==1)
                            Đã Xác Nhận
                            @elseif($orders->trangthai==2)
                            Đang Giao
                            @elseif($orders->trangthai==3)
                            Đã Giao
                            @elseif($orders->trangthai==4)
                            Đã Hủy
                            @endif
                        </td>
                    </tr>
                    @endforeach
              </table>
            </div>
          </div>

          {{-- <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">Thông tin vận chuyển</h4>
              <table class="table">
                    <tr class="">
                        <td>Họ Và Tên</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>Điện Thoại</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>Quốc gia</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>Mã Bưu Điện</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div> --}}
        </div>
      </div>
    </section>
@endsection