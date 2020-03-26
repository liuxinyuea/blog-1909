<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Http\Requests\StoreBrandPost;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(encrypt(123456));
        // 存储session
        // session(['name'=>'zhangsan']);
        // request()->session()->put('number',100);
        //  request()->session()->save();
        // 删除所有
        // request()->session()->flush();

        // 删除
        // session(['name'=>null]);
        // request()->session()->forget('number');

        // 获取session
        // echo session('name');
        // echo request()->session()->get('number');

        // 获取所有
         // dump(request()->session()->all());


        $name=request()->name;
        $where=[];
        if($name){
          $where[]=['brand_name','like',"%$name%"];
        }
        $url=request()->url;
        if($url){
          $where[]=['brand_url','like',"%$url%"];
        }
        $pageSize=config('app.pageSize');
        // $brand = DB::table('brand')->get();
        // ORM
        // $brand=Brand::all();
        // 倒叙
        $brand=Brand::where($where)->orderby('brand_id','desc')->paginate($pageSize);
        // all和get都可以
        // dd($brand);
        $query=request()->all();

        // ajax分页
        if(request()->ajax()){
            return view('brand.ajaxpage',['brand'=>$brand,'query'=>$query]);
        }


        return view('brand.index',['brand'=>$brand,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // 第二种验证
    public function store(StoreBrandPost $request)
    {
      // 第一种验证
       // $validatedData = $request->validate([ 
       //      'brand_name' => 'required|unique:brand|max:20',
       //      'brand_url' => 'required',
       //  ],[
       //      'brand_name.required'=>'品牌名称必填!',
       //      'brand_name.unique'=>'品牌名称已存在!',
       //      'brand_name.max'=>'品牌名称最大长度不超过20位!',
       //      'brand_url.required'=>'品牌网址必填!',
       //  ]);

       $post=$request->except('_token');
       // dd($post);
       // $res=DB::table('brand')->insert($post);
       // dd($res); 

       // 文件上传
       if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');

       }

       // ORM添加第一种方式
       /*$brand=new Brand;
       $brand->brand_name=$request->brand_name;
       $brand->brand_url=$request->brand_url;
       $brand->brand_logo=$request->brand_logo;
       $brand->brand_desc=$request->brand_desc;
       $res=$brand->save();*/

       // ORM添加第二种方式
       $res=Brand::insert($post);
       // ORM添加第三种方式
       // $res=Brand::create($post);
        // dd($res);
        if($res){
        return redirect('/brand/index');
       }

    }
    // 文件上传
    public function upload($img){
        // 判断上传过程中有无错误
        if(request()->file($img)->isValid()){
            // 接收文件
            $file=request()->$img;
            $store_result=$file->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }

    /**
     * Display the specified resource.
     *详情页展示（预览）
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }  

    /**
     * Show the form for editing the specified resource.
     *展示编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // 根据id获取单条记录
        // $brand=DB::table('brand')->where('brand_id',$id)->first();
        // dd($brand);
        // ORM
        /*一*/
        // $brand=Brand::find($id);
        /*二*/
        $brand=Brand::where('brand_id',$id)->first();
        return view('brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $post=$request->except(['_token']);
       // $res=DB::table('brand')->where('brand_id',$id)->update($post);

       // 文件上传
       if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');

       }

       //ORM 第一种save
       // $brand=Brand::sind($id);
       // $brand->brand_name=$request->brand_name;
       // $brand->brand_url=$request->brand_url;
       // $brand->brand_logo=$request->brand_logo;
       // $brand->brand_desc=$request->brand_desc;
       // $res=$brand->save();

       //ORM 第一种save
        $res=Brand::where('brand_id',$id)->update($post);
       // dd($res);
       if($res!==false){
        return redirect('/brand/index');
       }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $res=DB::table('brand')->where('brand_id',$id)->delete();

        // ORM
        $res=Brand::destroy($id); 


      
        if($res){
            if(request()->ajax()){
                return json_encode(['code'=>'00000','msg'=>'删除成功']);
            }
        return redirect('/goods/index');
       }
    }
}
