<?php

namespace App\Http\Controllers;

use App\Models\BlogSubComment;
use DB;
use App\Models\Uer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogSubCommentController extends Controller
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
    public function store(Request $request,BlogSubComment $blogSubComment)
    {
        //dd($request);
        $request->validate([
            'user_id'=>'required',
            'bid'=>'required',
            'user_name'=>'required',
            'comment'=>'required',
            'comment_id'=>'required'
        ]);
        //dd($request);
        $blogSubComment->user_id=$request->user_id;
        $blogSubComment->user_name=$request->user_name;
        $blogSubComment->blog_id=$request->bid;
        $blogSubComment->comment_id=$request->comment_id;
        $blogSubComment->subcomment=$request->comment;
        $blogSubComment->save();
        //dd($blogSubComment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogSubComment  $blogSubComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogSubComment $blogSubComment)
    {
        $bscdata=DB::table('blog_sub_comments')
                    ->join('users', 'users.id', '=', 'blog_sub_comments.user_id')
                    ->select('blog_sub_comments.*', 'users.profile_pic','users.name')->get();
        echo $bscdata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogSubComment  $blogSubComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogSubComment $blogSubComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogSubComment  $blogSubComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogSubComment $blogSubComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogSubComment  $blogSubComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogSubComment $blogSubComment)
    {
        //
    }
}
