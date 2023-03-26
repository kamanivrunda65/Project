<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use App\Models\User;
use App\Models\Blog;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
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
    public function store(Request $request,BlogComment $blogComment,Blog $blog)
    {
        // dd($request);
        $request->validate([
            'user_id'=>'required',
            'blog_id'=>'required',
            'user_name'=>'required',
            'comment'=>'required'
        ]);
        $blogComment->user_id=$request->user_id;
        $blogComment->user_name=$request->user_name;
        $blogComment->blog_id=$request->blog_id;
        $blogComment->comment=$request->comment;
        
        $id=$request->blog_id;
        $blogbyid=$blog->find($id);
        $comments=$blogbyid->comments;
        $comments=$comments+1;
        $blogbyid->comments=$comments;
        $blogbyid->save();
        echo $blogComment->save();
        //redirect()->back();
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogComment $blogComment,User $user)
    {
        $bcdata=DB::table('blog_comments')
                    ->join('users', 'users.id', '=', 'blog_comments.user_id')
                    ->select('blog_comments.*', 'users.profile_pic','users.name')->get();
        echo $bcdata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogComment $blogComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComment $blogComment)
    {
        //
    }
}
