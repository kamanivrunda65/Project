<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use DB;
use App\Models\Blog;
use App\Models\Tags;
use App\Models\User;
use App\Models\Blogcart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Pagination\LengthAwarePaginator;

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
    public function trending(Blog $blog)
    {
        $blogdata=$blog->orderby('comments','DESC')->take(3)->get();
        echo $blogdata;
    }
    public function blogsection(Blog $blog)
    {
        $blogdata=DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
        ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')->orderby('views','DESC')->take(6)->get();
        echo $blogdata;
    }
    public function singleblog($id,Blog $blog,User $user,Category $category,Blogcart $blogcart)
    {
        $blogbyid=$blog->find($id);
        $userid=$blogbyid->user_id;
        $cid=$blogbyid->category;
        $categorybyid=$category->find($cid);
        $userbyid=$user->find($userid);
        $viewers=$blogbyid->views;
        $viewers=$viewers+1;
        $blogbyid->views=$viewers;
        if(Auth::check())
        {
            $user_id=Auth::user()->id;
            $cart=$blogcart->where("blog_id","=","$id")->where("user_id","=","$user_id")->value('id');
            if($cart!=null)
            {
                $blogbyid->save();
                return view('layouts.blog')->with(['blogdata'=>$blogbyid])->with(['userdata'=>$userbyid])->with(['categorydata'=>$categorybyid])->with(['cart'=>1])->with(['uid'=>$user_id]);

            }
            else
            {
                $blogbyid->save();
                return view('layouts.blog')->with(['blogdata'=>$blogbyid])->with(['userdata'=>$userbyid])->with(['categorydata'=>$categorybyid])->with(['cart'=>0])->with(['uid'=>$user_id]);
            }
        }
        
        
        return view('layouts.blog')->with(['blogdata'=>$blogbyid])->with(['userdata'=>$userbyid])->with(['categorydata'=>$categorybyid])->with(['cart'=>0])->with(['uid'=>0]);
        //return view('layouts.blog');

    }
    public function search(Request $request,Blog $blog)
    {
        //dd($request);
        $abc=$request->search;
        //dd($abc);
        $result= DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
        ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')->orderby('id','DESC')
        ->where('blog_title', "Like","%$abc%")->orwhere('user_name',"LIKE","%$abc%")->get();
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
        ->where('blog_title', "Like","%$abc%")->orwhere('user_name',"LIKE","%$abc%")->get();
        //dd($result);
        // $result=ColectionPaginate::paginate($results, 6);
        // echo response()->json(['search'=>$results]);
        //$result=$results->json();
        //echo $results;
        // dd($result);
        return view('layouts.blogs',compact('result'));

    }
    public function categoryblog($name,Category $category)
    {
        $id=$category->where('categoryname',"=","$name")->value('id');
        $result= DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
        ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')->orderby('id','DESC')
        ->where('category', "=","$id")->get();  
        return view('layouts.blogs',compact('result'));
        //echo $resultdata;
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
    public function store(Blog $blog,Request $request,Category $category,User $user,Tags $tags)
    {
       // dd($request);
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
         $blogtitle=ucfirst($request->blog_title);
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
         $blog->blog_title=$blogtitle;
         $blog->blog_content=$request->blog_content;
         $blog->tags=$request->tags;
         $blog->image=$imagearray;
         $blog->category=$request->category;

         $uid=$request->user_id;
         $userbyid=$user->find($uid);
        $totalblog=$userbyid->total_blogs;
        $totalblog=$totalblog+1;
        $userbyid->total_blogs=$totalblog;


        $cid=$request->category;
        $cdata=$category->find($cid);
        $total=$cdata->total;
        $total=$total+1;
        $cdata->total=$total;

        $tag=strtolower($request->tags);
        $tagdata=explode(',',$tag);
        foreach($tagdata as $tag){
            $tagid=DB::table('tags')->where('tagname',"=","$tag")->value('id');
            if($tagid==null)
            {
                $tags->tagname=$tag;
                $tags->total_blog=1;
                $tag->save();
            }
            if($tagid!=null)
            {
                $tagdata=$tags->find($tagid);
                $totalblog=$tagdata->total_blog;
                $totalblog=$totalblog+1;
                $tagdata->total_blog=$totalblog;
                $tagdata->save();
            }
        }


        $cdata->save();
        $userbyid->save();
         //dd($cdata->total);
         $blog->save();
         toastr()->success("Blog post successfully.");
         return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog,Request $request,Category $category)
    {
        
        // $blogdata=$blog->get();
        // return response()->json($blogdata,200);
        $search=$request->search;
        $tagname=$request->tag;
        if($tagname!=null)
        {
            $tag=$tagname;
            // dd($tag);
        }
        else
        {
            $tag="";
        }
        $categoryname = $request->category;
        $pageno=$request->page;
        $selectdata=$request->perPage;
        $perPage = request()->query('perPage', $selectdata);
        $page = request()->query('page', $pageno);
        $offset = ($page - 1) * $perPage;
        if($categoryname=="all")
        {
            $data1=$blog->where('tags',"LIKE","%$tag%")->where('blog_title', "Like","%$search%")->orwhere('user_name',"LIKE","%$search%")->get();
            $data = DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
            ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')->where('tags',"LIKE","%$tag%")->where('blog_title', "Like","%$search%")->orwhere('user_name',"LIKE","%$search%")
            ->orderby('id','DESC')->offset($offset)->limit($perPage)->get();
        }
       
        else
        {
            $data1=$blog->where('tags',"LIKE","%$tag%")->where('blogs.category',"=","$categoryname")->get();
            $data = DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
            ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')->where('blogs.category',"=","$categoryname")->where('tags',"LIKE","%$tag%")
            ->orderby('id','DESC')->offset($offset)->limit($perPage)->get();
        }
        $total = $data1->count();
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
    public function destroy($blog_id,Blog $blog,Category $category,User $user)
    {
        $blogbyid=$blog->find($blog_id);

        $cid=$blogbyid->category;
        $cdata=$category->find($cid);
        $total=$cdata->total;
        $total=$total-1;
        $cdata->total=$total;
       

        $uid=$blogbyid->user_id;
        $userbyid=$user->find($uid);
        $totalblog=$userbyid->total_blogs;
        $totalblog=$totalblog-1;
        $userbyid->total_blogs=$totalblog;
        
        $tagarray=$blogbyid->tags;
        $tagdata=explode(",",$tagarray);
        foreach($tagarray as $tag){
            $tagid=DB::table('tags')->where('tagname',"=","$tag")->value('id');
            $tagdata=$tags->find($tagid);
            $totalblog=$tagdata->total_blog;
            $totalblog=$totalblog-1;
            $tagdata->total_blog=$totalblog;
            $tagdata->save();

        }
        
        $userbyid->save();
        $cdata->save();
        echo $blogbyid->delete();
    }
}
