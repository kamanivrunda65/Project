<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswerController extends Controller
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
    public function store(Request $request,Answer $answer,Question $question)
    {
        $request->validate([
            'user_id'=>'required',
             'user_name'=>'required',
             'answer'=>'required',
             'question_id'=>'required',
            'answerfile'=>['mimes:jpeg,jpg,pdf','min:1']
         ]);
          
         //dd($request->all());
         if($request->file('answerfile')!=null){
            $filename=time()."-answer.".$request->file('answerfile')->getClientOriginalExtension();
            $request->file('answerfile')->move(base_path('public\asset\assets\answer_file'),$filename);
            $file="assets/answer_file/".$filename;
            $answer->answerfile=$file;
         }
        $answer->user_id=$request->user_id;
        $answer->user_name=$request->user_name;
        $answer->question_id=$request->question_id;
        $answer->answer=$request->answer;

         $qid=$request->question_id;
         $qdata=$question->find($qid);
         $answers=$qdata->answers;
         $answers=$answers+1;
         $qdata->answers=$answers;
         $qdata->save();

        $answer->save();

       // dd($request->all());
       // dd($answer);
        // dd($request->file('answerfile'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer,User $user)
    {
        $answerdata=DB::table('answers')->join('users', 'users.id', '=', 'answers.user_id')->select('answers.*','users.profile_pic','users.name')->get();
        // $uid=$answerdata->user_id;
        // $userdata=$user->find($uid);
        echo $answerdata;
    }


    public function votes($id,$uid,Answer $answer)
    {
        
        // $votebyaid=$answer->find($id);
        // $vote=$votebyaid->votes;
        // $vote=$vote+1;
        // $votebyaid->votes=$vote;
        // echo $votebyaid->save();
        echo $id;
        echo $uid;
        //echo $vote;
        //echo $votebyaid;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Answer $answer,Question $question)
    {
        $answerbyid=$answer->find($id);
        //echo $answerbyid;
        $qid=$answerbyid->question_id;
        $qdata=$question->find($qid);
        $answers=$qdata->answers;
        $answers=$answers-1;
        $qdata->$answers=$answers;
        $qdata->save();
        $answerbyid->delete();
    }
}
