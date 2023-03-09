<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orders_detail';
    protected $fillable = ['order_id', 'product_id', 'amount', 'price'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    public function product_info(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }
    public static function getAllOrderDeatil()
    {
        return OrderDetail::with(['product_info'])->join('orders', )->paginate(10);
    }
}
