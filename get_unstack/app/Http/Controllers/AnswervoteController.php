<?php

namespace App\Http\Controllers;

use App\Models\Answervote;
use App\Models\Answer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswervoteController extends Controller
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
    public function store($aid,$uid,Answer $answer,Answervote $answervote)
    {
        $data=$answervote->select('answervotes.*')->where("answer_id","=","$qid")->where("user_id","=","$uid")->get();
        $avdata=$data->all();
        
        if($avdata!=null)
        {
            $avid=$avdata->id;
            $avdata=$answervote->where("id","=","$avid")->get();
            echo $avdata->save();
        }
        // dd($aid,$uid);
        else
        {
            $answervote->answer_id=$aid;
            $answervote->user_id=$uid;
            $adata=$answer->find($aid);
            $votes=$adata->votes;
            $votes=$votes+1;
            $adata->votes=$votes;
            $adata->save();
            echo $answervote->save();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answervote  $answervote
     * @return \Illuminate\Http\Response
     */
    public function show(Answervote $answervote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answervote  $answervote
     * @return \Illuminate\Http\Response
     */
    public function edit(Answervote $answervote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answervote  $answervote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answervote $answervote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answervote  $answervote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answervote $answervote)
    {
        //
    }
}
