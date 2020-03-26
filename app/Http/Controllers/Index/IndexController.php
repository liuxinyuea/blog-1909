<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
    public function index(){
    	// 先去缓存读取数据
    	// Cache::flush();
    	// $goods=Cache::get('is_slide');
    	// $goods=cache('is_slide');
        // Redis::flushall();
        $goods=Redis::get('is_slide');
    	// dump($goods);
    	// dd($goods);
    	if(!$goods){
    		// echo "Db=====";
    		// 如果缓存没有就读取数据库
    		
			$goods=Goods::getSlideData();
			// dd($goods);
	    	// dd($goods);

	    	// 存入memcache 
	    	// Cache::put('is_slide',$goods,60*60*24);
	    	// cache(['is_slide'=>$goods],60*60*24);
            $goods=serialize($goods);
            Redis::setex('is_slide',60*60*24,$goods);



    	}
        $goods=unserialize($goods);
    	$new_res=Goods::where('is_new','是')->take(4)->get();
	     	$best_res=Goods::where('is_best','是')->take(4)->get();
	       	$is_res=Goods::where('is_show','是')->take(4)->get();
			$pid_res=Category::where('pid',0)->get();
    	
    	return view('index.index',['best_res'=>$best_res,'goods'=>$goods,'new_res'=>$new_res,'is_res'=>$is_res,'pid_res'=>$pid_res]);
    }
}
