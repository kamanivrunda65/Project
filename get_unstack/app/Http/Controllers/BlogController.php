<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    public function post()
    {
        return view('layouts.post');
    }
    public function blogs()
    {
        return view('layouts.blogs');
    }
    public function singleblog($id,Blog $blog,User $user)
    {
        $blogbyid=$blog->find($id);
        $userid=$blogbyid->user_id;
        $userbyid=$user->find($userid);
        return view('layouts.blog')->with(['blogdata'=>$blogbyid])->with(['userdata'=>$userbyid]);
        //return view('layouts.blog');

    }
    public function search(Request $request,Blog $blog)
    {
        //dd($request);
        $abc=$request->search;
        //dd($abc);
        $result= DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
        ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')->orderby('id','DESC')
        ->where('blog_title', "Like","%$abc%")->get();
        // return response()->json(['blogs'=>$data],200);
        return view('admin.blogtable',compact('result'));
        //dd($abc);
        // $result= json_decode($data, true);
    }
    public function searchblog(Request $request,Blog $blog)
    {
        $abc=$request->searchblog;
        $result= DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
        ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')->orderby('id','DESC')
        ->where('blog_title', "Like","%$abc%")->get();
        // echo response()->json(['search'=>$results]);
        //$result=$results->json();
        //echo $results;
        // dd($result);
        return view('layouts.blogs',compact('result'));

    }
    public function categoryblog($id)
    {
        $result= DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
        ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')->orderby('id','DESC')
        ->where('category', "=","$id")->get();   
        return view('layouts.blogs',compact('result'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Blog $blog,Request $request)
    {
       // dd($request->all());
        // dd($request->file('image'));
        // dd($file);
        // echo "<pre>";
        // print_r($request);
        $request->validate([
            'user_id'=>'required',
             'user_name'=>'required',
             'blog_title'=>'required',
             'tags'=>'required',
             'category'=>'required',
            'blog_content'=>'required',
            'image'=>'required','mimes:jpeg,jpg','max:6'
         ]);
         //dd($request->all());
         $image=$request->file('image');
         //dd($image);
         $imagefile=[];
         for($i=0;$i<sizeof($image);$i++){
            $filename=time()."-blog-".$image[$i]->getClientOriginalName();
            $image[$i]->move(base_path('public\asset\assets\blog-images'),$filename);
            $file="assets/blog-images/".$filename;
            array_push($imagefile,$file);
         }
         $imagearray=implode(",",$imagefile);
         
         $blog->user_id=$request->user_id;
         $blog->user_name=$request->user_name;
         $blog->blog_title=$request->blog_title;
         $blog->blog_content=$request->blog_content;
         $blog->tags=$request->tags;
         $blog->image=$imagearray;
         $blog->category=$request->category;
         $blog->save();
         return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // $blogdata=$blog->get();
        // return response()->json($blogdata,200);
        $perPage = request()->query('perPage', 10);
        $page = request()->query('page', 1);
        $offset = ($page - 1) * $perPage;
        $data = DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
        ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')
        ->orderby('id','DESC')->offset($offset)->limit($perPage)->get();
        $total = DB::table('blogs')->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'perPage' => $perPage,
            'page' => $page,
        ]);
    }
    public function showtable(Blog $blog)
    {
        $perPage = request()->query('perPage', 10);
        $page = request()->query('page', 1);
        $offset = ($page - 1) * $perPage;
        $data = DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
        ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')
        ->orderby('id','DESC')->offset($offset)->limit($perPage)->get();
        $total = DB::table('blogs')->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'perPage' => $perPage,
            'page' => $page,
        ]);
    }


  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog_id,Blog $blog)
    {
        $blogbyid=$blog->find($blog_id);
        echo $blogbyid->delete();
    }
}
