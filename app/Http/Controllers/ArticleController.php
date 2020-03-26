<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    { 
        $title=request()->title;
        // $category=Category::all();
        $where=[];
        if($title){
          $where[]=['title','like',"%$title%"];
        }
        // $cate_name=request()->cate_name;
        //  if($cate_name){
        //   $where[]=['cate_name','like',"%$cate_name%"];
        // }
        $pageSize=config('app.pageSize');
         $query=request()->all();
        $article=Article::select('article.*','category.cate_name')
                    ->leftjoin('category','article.cate_id','=','category.cate_id')
                   
                    ->where($where)
                    ->paginate($pageSize);
        return view('article.index',['article'=>$article,'query'=>$query]);
    } //
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $category=Category::all();
       return  view('article.create',['category'=>$category]);
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
            'title' => 'required|unique:article',
            'author' => 'required',
             'email' => 'required',
             'img' => 'required',
           
        ],[
            'title.required'=>'文章标题必填!',
            'title.unique'=>'文章标题已存在!',
            'author.required'=>'文章作者必填!',
             'email.required'=>'邮箱必填!',
              'img.required'=>'请上传相关图片',
        ]);

         //添加时间
        $post['time']=time();
        $post=$request->except('_token');
       // 文件上传
        if($request->hasFile('img')){
            $post['img']=upload('img');
      }
       $res=Article::insert($post);
       // dd($res);
        if($res){
        return redirect('/article/index');
       }
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
    public function edit($id)
    {
       $category=Category::all();
        $article=Article::where('id',$id)->first();
        return view('article.edit',['article'=>$article,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $post=$request->except(['_token']);
       // $res=DB::table('brand')->where('brand_id',$id)->update($post);

       // 文件上传
       if($request->hasFile('img')){
            $post['img']=$this->upload('img');

       }

       //ORM 第一种save
        $res=Article::where('id',$id)->update($post);
       // dd($res);
       if($res!==false){
        return redirect('/article/index');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // ORM
        $res=Article::destroy($id);


        // dd($res);
        if($res){
        return redirect('/article/index');
       }
    }
}
