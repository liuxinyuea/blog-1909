<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\Brand;
use App\Category;
use DB;
use Illuminate\Support\Facades\Auth;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 打印用户信息
        // $user=Auth::user();
        // $user=Auth::id();
        // dd($user);
        // 测试是否登录
        // dd(Auth::check());
        $goods_name=request()->goods_name;
        $where=[];
        if($goods_name){
            $where[]=['goods_name','like',"%$goods_name%"];
        }
        // DB::connection()->enableQueryLog();
         $pageSize=config('app.pageSize');
         $goods=Goods::select('goods.*','brand.brand_name','category.cate_name')
                    ->leftjoin('category','goods.cate_id','=','category.cate_id')
                    ->leftjoin('brand','goods.brand_id','=','brand.brand_id')
                    ->where($where)
                    ->paginate($pageSize);
       // $logs = DB::getQueryLog();
       //  dd($logs);
       // dd($goods);die;
       return view('goods.index',['goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 品牌
        $brand=Brand::all();
        $category=Category::all();
        // dd($brand);
        // 无限极分类
        $category=CreateTree($category);
        // dd($category);
        return view('goods.create',['brand'=>$brand,'category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证
       $validatedData = $request->validate([ 
            'goods_name' => 'required|unique:goods|max:50|min:2',
            'goods_num' => 'required',
            'goods_price' => 'required',
            'goods_size' => 'required',
        ],[
            'goods_name.required'=>'商品名称必填!',
            'goods_name.unique'=>'商品名称已存在!',
            'goods_name.max'=>'商品名称最大长度不超过50位!',
            'goods_name.min'=>'商品名称最小长度不小于2位!',
            'goods_num.required'=>'商品库存必填!',
            'goods_price.required'=>'商品价格必填!',
            'goods_size.required'=>'商品货号必填!',
        ]);


        $post=$request->except('_token');
        // dd($post);
        // 文件上传
       if($request->hasFile('goods_img')){
            $post['goods_img']=$this->upload('goods_img');
      }
      // 相册
      if($request->hasFile('goods_imgs')){
            $goods_imgs=$this->Moreupload('goods_imgs');
            $post['goods_imgs']=implode('|',$goods_imgs);
       }
      $res=Goods::insert($post);
       // dd($res);die;
      if($res){
        return redirect('/goods/index');
       }
    }
    // 文件上传
    public function upload($goods_img){
      // 接收文件
      $file=request()->goods_img;
        // 判断上传过程中有无错误
        if($file->isValid()){
            $store_result=$file->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }
    public function Moreupload($goods_img){
      // 接收文件
      $file=request()->$goods_img;
      foreach($file as $k=>$v){
        // 判断上传过程中有无错误
        if($v->isValid()){
            $store_result[$k]=$v->store('uploads');

        }else{
            $store_result[$k]='未获取到上传文件或上传过程出错';
        }
      
      }
        return $store_result;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($goods_id)
    {
        $goods=Goods::where('goods_id',$goods_id)->first();
        return view('goods.edit',['goods'=>$goods]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $goods_id)
    {

       $post=$request->except(['_token']);

        // 文件上传
       if($request->hasFile('goods_img')){
            $post['goods_img']=$this->upload('goods_img');
      }
      // 相册
      if($request->hasFile('goods_imgs')){
            $goods_imgs=$this->Moreupload('goods_imgs');
            $post['goods_imgs']=implode('|',$goods_imgs);
       }

       //ORM 第一种save
        $res=Goods::where('goods_id',$goods_id)->update($post);
       // dd($res);
       if($res!==false){
        return redirect('/goods/index');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($goods_id)
    {
        $res=Goods::destroy($goods_id);
        if($res){
            if(request()->ajax()){
                return json_encode(['code'=>'00000','msg'=>'删除成功']);
            }
        return redirect('/goods/index');
       }
    }
}
