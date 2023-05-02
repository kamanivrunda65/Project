<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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
           
             'answer'=>'required',
             'question_id'=>'required',
            'answerfile'=>['mimes:jpeg,jpg,pdf','min:1']
         ]);
          $userid=Auth::user()->id;
          $username=Auth::user()->name;
         //dd($request->all());
         if($request->file('answerfile')!=null){
            $filename=time()."-answer.".$request->file('answerfile')->getClientOriginalExtension();
            $request->file('answerfile')->move(base_path('public\asset\assets\answer_file'),$filename);
            $file="assets/answer_file/".$filename;
            $answer->answerfile=$file;
         }
        $answer->user_id=$userid;
        $answer->user_name=$username;
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
    function rightanswer($aid,$qid,Answer $answer,User $user)
    {
        $data=Answer::select('answers.id')->where("question_id","=","$qid")->where("correct_answer","=","1")->value('id');

        if($data!=null)
        {
            //$data1=$data->correct_answer;
             //dd($data);
             $answerdata=$answer->find($data);
             $correct=$answerdata->correct_answer;
             $correct=0;
             $answerdata->correct_answer=$correct;



             $uid=$answerdata->user_id;
             $userbyid=$user->find($uid);
             $accept_answer=$userbyid->accepted_answer;
             $accept_answer=$accept_answer-1;
             $userbyid->accepted_answer=$accept_answer;
             $userbyid->save();

            // dd($answerdata);
             echo $answerdata->save();
        }
        
            $adata=$answer->find($aid);
            $correct=$adata->correct_answer;
            if($correct==0){
                $correct=1;
                //dd($correct);
                $adata->correct_answer=$correct;
                $uid=$adata->user_id;
                $userbyid=$user->find($uid);
                $accept_answer=$userbyid->accepted_answer;
                $accept_answer=$accept_answer+1;
                $userbyid->accepted_answer=$accept_answer;
                $userbyid->save();

                echo $adata->save();
            }
   }

   public function wronganswer($aid,$qid,Answer $answer)
   {
        $adata=$answer->find($aid);
        $correct=$adata->correct_answer;
        $correct=0;
        $adata->correct_answer=$correct;
        echo $adata->save();
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
    public function destroy($id,Answer $answer,Question $question,User $user)
    {
        $answerbyid=$answer->find($id);
        //echo $answerbyid;
        $qid=$answerbyid->question_id;
        $qdata=$question->find($qid);
        $answers=$qdata->answers;
        $answers=$answers-1;
        $qdata->answers=$answers;
        $qdata->save();

        $uid=$answer->user_id;
        $userbyid=$user->find($uid);
        $totalanswer=$user->total_answer;
        $totalanswer=$totalanswer-1;
        $userbyid->total_answer=$totalanswer;
        $userbyid->save();

        $writeanswer=$answerbyid->correct_answer;
        if($writeanswer==1)
        {
        $uid=$answerbyid->user_id;
        $userbyid=$user->find($uid);
        $accept_answer=$userbyid->accepted_answer;
        $accept_answer=$accept_answer-1;
        $userbyid->accepted_answer=$accept_answer;
        $userbyid->save();
        }
        $answerbyid->delete();
    }
}
