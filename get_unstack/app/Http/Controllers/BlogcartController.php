<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;
use App\Models\Blogcart;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogcartController extends Controller
{
    public function saveblog($bid,$uid,Request $request,Blogcart $blogcart)
    {
        $blogcart->user_id=$uid;
        $blogcart->blog_id=$bid;
        echo $blogcart->save();
        
    }
    public function cartblogdrop($bcid,Blogcart $blogcart)
    {
        // dd($bcid);
        $blogcartdata=$blogcart->find($bcid);
        echo $blogcartdata->delete();
        // return redirect('singlequestion');
    }
    public function usersavedblog($userid,Blogcart $blogcart,Blog $blog)
    {
        $data=DB::table('blogcarts')->join("blogs","blogs.id","=","blogcarts.blog_id")->join("users","users.id","=","blogs.user_id")->join("categories","categories.id","=","blogs.category")
        ->select('blogcarts.*','blogs.blog_title','blogs.image','users.name','users.profile_pic',"categories.categoryname")
        ->where("blogcarts.user_id","=","$userid")->orderby('blogcarts.id','DESC')->get();
        echo $data;
    }
}
