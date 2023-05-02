<?php

namespace App\Http\Controllers;
use Mail;
use App\Models\BlogSubComment;
use App\Models\Blog;
use App\Models\BlogComment;
use DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Notificationmail;

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
    public function store(Request $request,BlogSubComment $blogSubComment,User $user,Blog $blog,BlogComment $blogComment)
    {
        //dd($request);
        $request->validate([
            'user_id'=>'required',
            'bid'=>'required',
            'comment'=>'required',
            'comment_id'=>'required'
        ]);
        //dd($request);
        $blogSubComment->user_id=$request->user_id;
        $uid=$request->user_id;
        $userdata=$user->find($uid);
        $username=$userdata->name;
        $blogSubComment->user_name=$username;
        $blogSubComment->blog_id=$request->bid;
        $blogSubComment->comment_id=$request->comment_id;
        $blogSubComment->subcomment=$request->comment;



        $bdata=$blog->find($request->bid);
        $id=$request->bid;
        $data=$blogComment->find($request->comment_id);
        $uid=$data->user_id;
        $nmaildata = [
            'title' => 'Mail from GET_UNSTACK',
            'body' => 'Check notification on your profile',
            'msg'=> "$username give reply on your comment.",
            'link'=>"/blog/$id",
            'user_id'=>"$uid",
            
        ];

        Mail::to('kamanivrunda65@gmail.com')->send(new Notificationmail($nmaildata));
        //echo $blogSubComment->save();

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
    public function destroy($id,BlogSubComment $blogSubComment)
    {
        $bscdata=$blogSubComment->find($id);
        echo $bscdata->delete();
        
    }
}
