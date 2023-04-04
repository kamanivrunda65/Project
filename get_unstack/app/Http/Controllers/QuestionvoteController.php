<?php

namespace App\Http\Controllers;

use App\Models\Questionvote;
use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionvoteController extends Controller
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
    public function store($qid,$uid,Question $question,Questionvote $questionvote)
    {
        $data=$questionvote->select('questionvotes.*')->where("question_id","=","$qid")->where("user_id","=","$uid")->value('id');
        //dd($data);
        // $qvdata=$data->all();
        
        if($data!=null)
        {
            // $qvid=$qvdata->id;
            $qvdata=$questionvote->find($data);
            echo $qvdata->save();
        }
        else{
            $questionvote->question_id=$qid;
            $questionvote->user_id=$uid;
            $qdata=$question->find($qid);
            $votes=$qdata->votes;
            $votes=$votes+1;
            $qdata->votes=$votes;
            $qdata->save();
            echo $questionvote->save();
            // dd($qid);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questionvote  $questionvote
     * @return \Illuminate\Http\Response
     */
    public function show(Questionvote $questionvote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionvote  $questionvote
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionvote $questionvote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionvote  $questionvote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionvote $questionvote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionvote  $questionvote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionvote $questionvote)
    {
        //
    }
}
