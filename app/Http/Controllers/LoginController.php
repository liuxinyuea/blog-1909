<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class LoginController extends Controller
{
   public function login(){
        return view('login');
   }
   public function logindo(){
        $post=request()->except('_token');
       
        
        // $post['pwd']=md5(md5($post['pwd']));
        $adminuser=Admin::where('name',$post['name'])->first();
        if(decrypt($adminuser->pwd)!=$post['pwd']){
             return redirect('/login')->with('msg','用户名或者密码错误!');
        }
        session(['adminuser'=>$adminuser]);
         return redirect('/login/index');
}

   public function index(){
        return view('admin');
   }
}


?>
