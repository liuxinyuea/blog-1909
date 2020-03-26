<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Cart;
use Illuminate\Support\Facades\Cache; 
class GoodsController extends Controller
{
   public function index($goods_id){
         // 统计访问量
          // if(Cache::add('count_'.$goods_id,1)){
          //   $count=Cache::get('count_'.$goods_id);
          // }
          // else{
          //   $count=Cache::increment('count_'.$goods_id);
          // }

         $count=Cache::add('count_'.$goods_id,1) ? Cache::get('count_'.$goods_id):
            Cache::increment('count_'.$goods_id);
   		$goods=Goods::find($goods_id);

   		return view('index.goods',['goods'=>$goods,'count'=>$count]);
   }
   // 购物车
   public function addcart(Request $request){
   		
   		// 判断用户有没有登陆
   		$user=session('users');
   		$goods_id=$request->goods_id;
   		$buy_number=$request->buy_number;

   		// dd($user);die;
   		if(!$user){
   			return json_encode(['code'=>'00003','msg'=>'用户未登陆']);

   		}
   		// 根据商品id查询商品信息
   		$goods=Goods::find($goods_id);
   		 // 判断库存
   		// if($goods->goods_number<$buy_number){
   		// 	return json_encode(['code'=>'00004','msg'=>'库存不足']);
   		// }

   		// 判断用户之前是否添加过此商品
   		$cart=Cart::where(['user_id'=>$user->user_id,'goods_id'=>$goods_id])->first();
 		// dd($cart);

   		if($cart){
 			// 更新购买数量
 			$res=Cart::where('cart_id',$cart->cart_id)->increment('buy_number',$buy_number);
 		}else{
 			// 添加购物车
	   		$data=[
	   			'user_id'=>$user->user_id,
	   			'goods_id'=>$goods_id,
	   			'buy_number'=>$buy_number,
	   			'goods_name'=>$goods->goods_name,
	   			'goods_price'=>$goods->goods_price,
	   			'goods_img'=>$goods->goods_img,
	   			'addtime'=>time()
	   		];
	   		$res=Cart::create($data);
 		}
   		
   		
   		if( $res ){
   			return json_encode(['code'=>'00000','msg'=>'添加成功']);
   		}

   }
  
}
