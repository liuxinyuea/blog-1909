<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 闭包路由
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/hello', function () {
    return 'chinese';
});
Route::get('/index','IndexController@index');
Route::get('/goods','IndexController@goods');

// 闭包路由方法
// Route::get('/add', function () {
//     echo '<form action="/adddo" method="post">'.csrf_field().'<input type="text" name="name"><button>提交</button></form>';
// });
 
// Route::post('/adddo', function () {
//     echo request()->name;
// });

Route::get('/add','IndexController@add');
Route::post('/adddo','IndexController@adddo');

// 一个路由支持多种提交方式
// Route::match(['get','post'],'/add','IndexController@add');
// Route::any('/add','IndexController@add');

// 路由视图
// Route::view('/add','add');
// Route::get('/add','IndexController@add'); 

// 必填路由参数
// Route::get('/show/{id}/{name}',function ($id,$name) {
// 	echo $id."==".$name;
// });

// Route::get('/show/{id}','IndexController@show');

// 可选路由参数
// Route::get('/news/{id}/{name?}',function ($id,$name=null) {
// 	echo $id."==".$name;
// });
// Route::get('/news/{id?}','IndexController@news');

// 正则约束
// Route::get('/news/{id?}','IndexController@news')->where('id','[0-9]+');
// Route::get('/news/{id?}','IndexController@news')->where('id','\d+');

Route::get('/cate/{id}/{name}','IndexController@cate')->where(['id'=>'\d+','name'=>'[a-zA-Z]']);

// 品牌模块的CURD
// Route::prefix('brand')->middleware('islogin')->group(function(){
Route::prefix('brand')->middleware('auth')->group(function(){
		Route::get('create','BrandController@create');
		Route::post('store','BrandController@store');
		Route::get('index','BrandController@index');
		Route::get('edit/{id}','BrandController@edit');
		Route::post('update/{id}','BrandController@update');
		Route::get('destroy/{id}','BrandController@destroy');
		Route::get('do','BrandController@do');
});

Route::get('login','LoginController@login');
Route::post('logindo','LoginController@logindo');


Route::get('admin','LoginController@index');
Route::get('login/index','LoginController@index');




// 分类
Route::prefix('category')->middleware('islogin')->group(function(){
		Route::get('create','CategoryController@create');
		Route::post('store','CategoryController@store');
		Route::get('index','CategoryController@index');
		Route::get('edit/{id}','CategoryController@edit');
		Route::post('update/{id}','CategoryController@update');
		Route::get('destroy/{id}','CategoryController@destroy');
});

// 商品
Route::prefix('goods')->middleware('auth')->group(function(){
		Route::get('create','GoodsController@create');
		Route::post('store','GoodsController@store');
		Route::get('index','GoodsController@index');
		Route::get('edit/{goods_id}','GoodsController@edit');
		Route::post('update/{goods_id}','GoodsController@update');
		Route::get('destroy/{goods_id}','GoodsController@destroy');
});

// 管理员表
Route::prefix('admin')->middleware('islogin')->group(function(){
		Route::get('create','AdminController@create');
		Route::post('store','AdminController@store');
		Route::get('index','AdminController@index');
		Route::get('edit/{id}','AdminController@edit');
		Route::post('update/{id}','AdminController@update');
		Route::get('destroy/{id}','AdminController@destroy');
});


// 新闻
Route::get('/news/create','NewsController@create');
Route::post('/news/store','NewsController@store');
Route::get('/news/index','NewsController@index');
// 图书表
Route::get('/book/create','BookController@create');
Route::post('/book/store','BookController@store');
Route::get('/book/index','BookController@index');

// 售楼表
Route::get('/floor/create','FloorController@create');
Route::post('/floor/store','FloorController@store');
Route::get('/floor/index','FloorController@index');

// 文章的CURD
Route::prefix('article')->group(function(){
		Route::get('create','ArticleController@create');
		Route::post('store','ArticleController@store');
		Route::get('index','ArticleController@index');
		Route::get('edit/{id}','ArticleController@edit');
		Route::post('update/{id}','ArticleController@update');
		Route::get('destroy/{id}','ArticleController@destroy');
});

// 项目珠宝
Route::get('/','Index\IndexController@index')->name('index');
Route::get('/log','Index\LoginController@log');
Route::get('/reg','Index\LoginController@reg');
// 注册
Route::get('/reg/sendSMS','Index\LoginController@sendSMS');
Route::get('/reg/sendEmail','Index\LoginController@sendEmail');
Route::any('doRegister','Index\LoginController@doRegister');
// 登陆
Route::any('doLog','Index\LoginController@doLog');

// 商品详情
Route::get('/goods/{goods_id}','Index\GoodsController@index')->name('goods');
Route::post('/addcart','Index\GoodsController@addcart');
Route::get('/cart','Index\CartController@cart')->name('cart');
Route::get('/pay/{cart_id}','Index\PayController@pay');
// Route::get('/cookie/get','Index\LoginController@getcookie');
// Route::get('/login/logindo','Index\LoginController@logindo');
// Route::any('/reg/regdo','Index\LoginController@regdo');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
