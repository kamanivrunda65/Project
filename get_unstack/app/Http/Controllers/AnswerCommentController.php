<?php

namespace App\Http\Controllers;

use App\Models\AnswerComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function store(Request $request,AnswerComment $answerComment)
    {
        
        $request->validate([
            'user_id'=>'required',
            'user_name'=>'required',
             'qid'=>'required',
             'answer_id'=>'required',
            'comment'=>'required'
         ]);
         $answerComment->user_id=$request->user_id;
         $answerComment->user_name=$request->user_name;
         $answerComment->question_id=$request->qid;
         $answerComment->answer_id=$request->answer_id;
         $answerComment->comment=$request->comment;
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
