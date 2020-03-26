<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use APP\Cart;
use APP\Goods;
class PayController extends Controller
{
	// 发起支付
    public function pay($cart_id){
    	// $cart_id=explode(",",$cart_id);
    	// // dd($cart_id);
    	// $name=session("adminuser");
    	// $user_id=$name->user_id;
    	// // dd($user_id);die;
    	// $where=[
    	// 	["user_id","=",$user_id],
    	// 	["goods_del","=",1]
    	// ];
    	// $payInfo=Cart::join("goods","cart.goods_id","=","goods.goods_id")
    	// 			->where($where)
    	// 			->wherIn("goods.goods_id",$cart_id)
    	// 			->get();
    	// dd($payInfo);
       	return view('index.pay'); 
       	
    }
}
