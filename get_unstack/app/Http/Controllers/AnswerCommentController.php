<?php

namespace App\Http\Controllers;

use App\Models\AnswerComment;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerCommentController extends Controller
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
    public function store(Request $request,AnswerComment $answerComment,User $user)
    {
        
        $request->validate([
            'user_id'=>'required',
             'qid'=>'required',
             'answer_id'=>'required',
            'comment'=>'required'
         ]);
         $answerComment->user_id=$request->user_id;
         $userbyid=$user->find($request->user_id);
         $username=$userbyid->name;
         $answerComment->user_name=$username;
         $answerComment->question_id=$request->qid;
         $answerComment->answer_id=$request->answer_id;
         $answerComment->comment=$request->comment;
         //dd($answerComment);
         echo $answerComment->save();
        // return response()->json($request);
        //redirect()->back();
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnswerComment  $answerComment
     * @return \Illuminate\Http\Response
     */
    public function show(AnswerComment $answerComment)
    {
        $acdata=$answerComment->get();
        echo $acdata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnswerComment  $answerComment
     * @return \Illuminate\Http\Response
     */
    public function edit(AnswerComment $answerComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnswerComment  $answerComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnswerComment $answerComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnswerComment  $answerComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnswerComment $answerComment)
    {
        //
    }
}
