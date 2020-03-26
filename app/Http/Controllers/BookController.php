<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name=request()->name;
        $where=[];
        if($name){
          $where[]=['name','like',"%$name%"];
        }
        $pageSize=config('app.pageSize');
        $book=Book::where($where)->orderby('id','desc')->paginate($pageSize);
        // all和get都可以
        // dd($book);
        return view('book.index',['book'=>$book,'name'=>$name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'name' => 'required|unique:book|max:15|min:2',
            'author' => 'required',
           
        ],[
            'name.required'=>'图书名称必填!',
            'name.unique'=>'图书名称已存在!',
            'name.max'=>'图书名称最大长度不超过15位!',
            'name.min'=>'图书名称必须两位以上',
            'author.required'=>'图书作者必填!',
            
        ]);
       $post=$request->except('_token');
       // dd($post);die;
       // 文件上传
       if($request->hasFile('img')){
            $post['img']=$this->upload('img');
      }
       $res=Book::insert($post);
       // dd($res);die;
       if($res){
        return redirect('/book/index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
