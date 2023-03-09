@extends('frontend.layouts.master')
@section('main-content')
@section('title', 'Lịch Sử Mua Hàng')
<section class="wrapper login">
    <input name="__RequestVerificationToken" type="hidden"
        value="CfDJ8NWrZ30VhyxJm_fyyCNlLpJ2o-z-CQCNBNMnsNo5OH7RlPT8Berm2VQA00sppCKzGa6ODTS1rLRxVSIY7D1595jLZqxyIDDbdOMzNgyyIOxRyya1zwF_ngVYp-HaMHY65oq9_Nv7Ev0K618LAeUYDU4" />
    <div class="d1 step1">
        <img src="{{ asset('frontend/images/orders/image_order.png') }}" />
        <span>Tra cứu thông tin đơn hàng</span>
        <form id="frmGetVerifyCode" action="{{route('search.orders')}}"  method="POST" onsubmit="return GetVerifyCode();">
            @csrf
            <input type="tel" name="txtDienThoai" placeholder="Nhập số điện thoại mua hàng" autocomplete="off"
                maxlength="10" />
            <label class="hide"></label>
            <button type="submit"  class="btn">Tiếp tục</button>
        </form>
    </div>
       
    <!-- Quick View | Modal Area End Here -->
    {{-- <div class="d2 step2 hide">
        <span class="s1">Mã xác nhận đã được gửi đến số điện thoại <b></b></span>
        <span class="s2 hide">Mã xác nhận đã được gửi lại</span>
        <form id="frmSubmitVerifyCode" onsubmit="return SubmitVerifyCode()">
            <input type="tel" name="txtOTP" placeholder="Nhập mã xác nhận gồm 4 chữ số" maxlength="4"
                autocomplete="one-time-code" />
            <label class="hide"></label>
            <button type="submit" class="btn">Tiếp tục</button>
        </form>
        <a class="resend-sms" href="javascript:"></a>
        <a href="javascript:void(0)" onclick="changeNum()" class="btnChangeNum">Thay đổi số điện thoại</a>
    </div> --}}
</section>
@endsection
@push('styles')
<style>
    .login {
        text-align: center;
        font-family: ROBOTO LIGHT;
        background: url('../../images/bg.png') transparent repeat center top;
        min-height: calc(100vh - 55px);
        max-width: 100% !important
    }

    .login>div {
        margin: 3% auto;
        max-width: 500px;
        border: 1px solid #ccc;
        padding: 25px 0;
        background-color: #fff
    }

    .login>div>* {
        display: block;
        margin-bottom: 25px
    }

    .login>div>a {
        font-size: 14px;
        color: #666;
        font-weight: bold
    }

    .login>div>a.btnChangeNum {
        font-size: 13px;
        color: #288ad6;
        font-weight: normal
    }

    .login>div>img {
        max-width: 100%
    }

    .login>div>span {
        font-size: 20px;
        font-weight: normal;
        line-height: 1.5
    }

    .login>div>form>* {
        display: block;
        margin: auto;
        font-family: ROBOTO LIGHT
    }

    .login>div>form>.btn {
        cursor: pointer
    }

    .login>div>form>input {
        border: 1px solid #e0e0e0;
        border-radius: 100px;
        width: 200px;
        height: 48px;
        padding: 0 50px;
        background-repeat: no-repeat;
        background-position: 25px center;
        margin-bottom: 15px;
        font-size: 15px
    }

    .login>div.d1>form>input {
        background-image: url('../../images/icon-phone-blue.png');
        background-size: 14px 21px
    }

    .login>div>form>label {
        color: #f01;
        margin-bottom: 15px;
        width: 90%
    }

    .login>div.d2 {
        margin-top: 100px
    }

    .login>div.d2>span {
        width: 300px;
        margin-left: auto;
        margin-right: auto;
        font-size: 22px
    }

    .login>div>span>b {
        font-family: ROBOTO BOLD
    }

    .login>div.d2>form>input {
        background-image: url('../../images/icon-lock.png');
        background-size: 16px 17px;
        padding: 0 45px;
        width: 220px;
        background-position: 20px center;
        text-align: center
    }

    .btn {
        background-image: linear-gradient(-106deg, #51beed 2%, #288ad6 100%);
        box-shadow: 0 2px 6px 0 #9ed4ec;
        border-radius: 100px;
        width: 302px;
        height: 50px;
        border: none;
        text-transform: uppercase;
        color: #fff;
        font-size: 17px;
        max-width: 100%
    }

    @media screen and (max-width:768px) {
        .login {
            background: none;
            max-width: 640px !important
        }

        .login>div {
            max-width: 100%;
            margin: 0 0 100px 0;
            border: none;
            padding: 0
        }
    }
</style>
@endpush
