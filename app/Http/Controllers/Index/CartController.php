<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
class CartController extends Controller
{
    public function cart(){
    	$user_id=5;
    	$cartInfo=Cart::where('user_id',$user_id)->get();
    	$buy_number=array_column($cartInfo->toArray(),'buy_number');
    	$cart_id=array_column($cartInfo->toArray(),'cart_id');
    	// $cartInfo=Cart::all();
    	$count=Cart::count();
    	// dd($cartInfo);
    	return view('index.cart',['cartInfo'=>$cartInfo,'buy_number'=>$buy_number,'count'=>$count,'cart_id'=>$cart_id]);
    }
    
}
