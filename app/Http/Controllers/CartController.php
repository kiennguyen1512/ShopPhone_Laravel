<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Helper;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    protected $product = null;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart(Request $request)
    {
        // dd($request->all());
        if (empty($request->slug)) {
            request()->session()->flash('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
            return back();
        }
        $product = Product::where('slug', $request->slug)->first();
        // return $product;
        if (empty($product)) {
            request()->session()->flash('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
            return back();
        }

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->where('product_id', $product->id)->first();
        // return $already_cart;
        if ($already_cart) {
            // dd($already_cart);
            $already_cart->quantity = $already_cart->quantity + 1;
            $already_cart->amount = $product->price + $already_cart->amount;
            // return $already_cart->quantity;
            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');
            $already_cart->save();
        } else {

            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            $cart->price = ($product->price - ($product->price * $product->discount) / 100);
            $cart->quantity = 1;
            $cart->amount = $cart->price * $cart->quantity;
            if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');
            $cart->save();
            $wishlist = Wishlist::where('user_id', auth()->user()->id)->where('cart_id', null)->update(['cart_id' => $cart->id]);
        }
        request()->session()->flash('success', 'Sản phẩm đã được thêm vào giỏ hàng');
        return back();
    }

    public function singleAddToCart(Request $request)
    {
        $request->validate([
            'slug'      =>  'required',
            'quant'      =>  'required',
        ]);
        // dd($request->quant[1]);


        $product = Product::where('slug', $request->slug)->first();
        if ($product->stock < $request->quant[1]) {
            return back()->with('error', 'Sản phẩm này đã hết hàng!');
        }
        if (($request->quant[1] < 1) || empty($product)) {
            request()->session()->flash('error', 'Số lượng phải lớn hơn 1!');
            return back();
        }

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->where('product_id', $product->id)->first();

        if ($already_cart) {
            $already_cart->quantity = $already_cart->quantity + $request->quant[1];
            // $already_cart->price = ($product->price * $request->quant[1]) + $already_cart->price ;
            $already_cart->amount = ($product->price * $request->quant[1]) + $already_cart->amount;

            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error', 'Sản phẩm nãy đã hết hàng!');

            $already_cart->save();
        } else {

            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            $cart->price = ($product->price - ($product->price * $product->discount) / 100);
            $cart->quantity = $request->quant[1];
            $cart->amount = ($cart->price * $request->quant[1]);
            if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');
            //dd($cart);
            $cart->save();
        }
        request()->session()->flash('success', 'Sản phẩm đã được thêm vào giỏ hàng');
        return back();
    }

    public function cartDelete(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            request()->session()->flash('success', 'Xóa sản phẩm thành công');
            return back();
        }
        request()->session()->flash('error', 'Đã xảy ra lỗi không thể xóa');
        return back();
    }

    public function cartUpdate(Request $request)
    {
        // dd($request->all());
        if ($request->quant) {
            $error = array();
            $success = '';
            // return $request->quant;
            foreach ($request->quant as $k => $quant) {
                // return $k;
                $id = $request->qty_id[$k];
                // return $id;
                $cart = Cart::find($id);
                // return $cart;
                if ($quant > 0 && $cart) {
                    // return $quant;

                    if ($cart->product->stock < $quant) {
                        request()->session()->flash('error', 'Out of stock');
                        return back();
                    }
                    $cart->quantity = ($cart->product->stock > $quant) ? $quant  : $cart->product->stock;
                    // return $cart;

                    if ($cart->product->stock <= 0) continue;
                    $after_price = ($cart->product->price - ($cart->product->price * $cart->product->discount) / 100);
                    $cart->amount = $after_price * $quant;
                    // return $cart->price;
                    $cart->save();
                    $success = 'Cập nhật dữ liệu thành công';
                } else {
                    $error[] = 'Đã xảy ra lỗi khi lưu dữ liệu';
                }
            }
            return back()->with($error)->with('success', $success);
        } else {
            return back()->with('Cart Invalid!');
        }
    }

    public function checkout(Request $request)
    {
        return view('frontend.pages.checkout');
    }
    public function postPay(Request $request)
    {
        if (empty(Cart::where('user_id', auth()->user()->id)->where('order_id', null)->first())) {
            request()->session()->flash('error', 'Bạn chưa có sản phẩm !');
            return back();
        } else {
            $order = new Order();
            $product =Cart::where('user_id',auth()->user()->id)->get();
            $order->user_id=auth()->user()->id;
            $aray = ['DO', 'OD', 'DR', 'RD'];
            $order->mahd=Arr::random($aray) . rand(10000, 99999);
            $order->hoten=$request->hoten;
            $order['diachi']=$request->address.','.$request->address1.','.$request->address2.','.$request->address3;
            $order->email=$request->email;
            $order->ghichu=$request->ghichu;
            $order->dienthoai=$request->dienthoai;
            $order->httt=1;
            $order->ngaylap=Carbon::now();
            $order->tongtien=Helper::totalCartPrice();
            $order->trangthai=0;
            $order->save();
            foreach($product as $data){
                $order_detail=new OrderDetail();
                $product_info=Product::find($data->product_id);
                $order_detail->order_id=$order->id;
                $order_detail->product_id=$data->product_id;
                $order_detail->amount=$data->quantity;
                $order_detail->price=$data->amount;
                $sanpham=Product::where('id',$data->product_id)->get();
                foreach($sanpham as $sanphams){
                    $sanphams->stock=$sanphams->stock-$data->quantity;
                    $sanphams->save();
                }
                $data->save();
                $order_detail->save();
                Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);
            }
            return redirect()->route('home')->with('success','Đặt Hàng Thành Công');
        }
    }
}
