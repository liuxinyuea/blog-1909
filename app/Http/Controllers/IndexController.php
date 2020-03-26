<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class IndexController extends Controller{
	public function index(){
		echo "我是首页";
	}

	public function goods(){
		echo "我是商品";
	}

	public function add(){
		// dump(request()->isMethod('get'));
		if(request()->isMethod('get')){
			return view('add');
		}
		if(request()->isMethod('post')){
			echo request()->name;
		}
	}

	public function adddo(){
		echo request()->name;
		return redirect('/goods');
	}

	public function show($id){
		echo $id.'---'.$name;
	}

	public function news($id=null){
		echo "新闻详情页";
		echo $id;
	}

	public function cate($id,$name){
		echo "新闻分类页";
		echo $id.'=='.$name;
	}

}






 ?>