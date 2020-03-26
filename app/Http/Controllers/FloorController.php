<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Floor;
class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pageSize=config('app.pageSize');
       $floor=Floor::orderby('id','desc')->paginate($pageSize);
       // dd($floor);die;
       return view('floor.index',['floor'=>$floor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('floor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post=$request->except('_token');
       // dd($post);die;
       // 文件上传
       if($request->hasFile('img')){
            $post['img']=upload('img');
      }
      // 相册
      if($request->hasFile('imgs')){
            $imgs=Moreupload('imgs');
            $post['imgs']=implode('|',$imgs);
       }
       // dd($post);
       // dd($request->hasFile('img'));
       $res=Floor::insert($post);
       // dd($res);die;
       if($res){
        return redirect('/floor/index');
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
