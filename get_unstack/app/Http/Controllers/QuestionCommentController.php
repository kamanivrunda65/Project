<?php

namespace App\Http\Controllers;

use App\Models\QuestionComment;
use App\Models\User;
use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionCommentController extends Controller
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
    public function store(Request $request,QuestionComment $questionComment)
    {
        // return response()->json($request);
        dd($request);
        $request->validate([
            
             'comment'=>'required'
         ]);
         $userid=Auth::user()->id;
         $username=Auth::user()->name;
         $questionComment->user_id=$userid;
         $questionComment->user_name=$username;
         $questionComment->question_id=$request->question_id;
         $questionComment->comment=$request->comment;
         $questionComment->save();
         //dd($request);
         redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionComment  $questionComment
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionComment $questionComment)
    {
        $qcdata=$questionComment->get();
        echo $qcdata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionComment  $questionComment
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionComment $questionComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionComment  $questionComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionComment $questionComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionComment  $questionComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionComment $questionComment)
    {
        //
    }
}
