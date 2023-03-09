@extends('backend.layouts.master')

@section('title','Chi tiết đơn hàng')

@section('main-content')
<div class="card">
<h5 class="card-header">Chi tiết đơn hàng       <a href="" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Xuất PDF</a>
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>STT</th>
          <th>Mã hóa đơn</th>
          <th>Tên Sản Phẩm</th>
          <th>Số Lượng</th>
          <th>Giá</th>
          <th>Thành Tiền</th>
          <th>Tùy chọn</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order as $data)
        @php
         $totalPrice=($data->amount*$data->price);
        @endphp
        <tr>
            <td></td>
            <td>{{$data->mahd}}</td>
            <td>{{$data->title}}</td>
            <td>{{$data->amount}}</td>
            <td>{{number_format($data->price),2}} VNĐ</td>
            <td>{{number_format($totalPrice),2}} VNĐ</td>
            <td>
                {{-- @if($order->status=='new')
                  <span class="badge badge-primary">{{$order->status}}</span>
                @elseif($order->status=='process')
                  <span class="badge badge-warning">{{$order->status}}</span>
                @elseif($order->status=='delivered')
                  <span class="badge badge-success">{{$order->status}}</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif --}}
            </td>
            <td>
                {{-- <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </form> --}}
            </td>

        </tr>
        @endforeach
      </tbody>
    </table>

    {{-- <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">Thông tin đơn hàng</h4>
              <table class="table">
                    <tr class="">
                        <td>Mã Hóa đơn</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>Ngày Lập</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>Số Lượng</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>Trạng Thái Đơn Hànn</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                        <td>Phí vận chuyển</td>
                        <td> :  {{number_format($order->shipping->price),2}}VNĐ</td>
                    </tr>
                    <tr>
                      <td>Mã giảm giá</td>
                      <td> : {{number_format($order->coupon,2)}}VNĐ</td>
                    </tr>
                    <tr>
                        <td>Tổng Thanh Toán</td>
                        <td> :  {{number_format($order->total_amount),2}}VNĐ</td>
                    </tr>
                    <tr>
                        <td>Phương thức</td>
                        <td> : @if($order->payment_method=='cod') Cash on Delivery @else Paypal @endif</td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
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
          </div>
        </div>
      </div>
    </section> --}}
    @endif

  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
