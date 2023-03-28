<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Routing\UrlGenerator;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.question');
    }
    public function allquestion()
    {
        return view('layouts.allquestion');
    }
    public function singlequestion($id,Question $question,User $user)
    {
         $data=$question->find($id);
         //dd($data1);
         $userid=$data->user_id;
         $userdata=$user->find($userid);
         //dd($userdata);
        //  $questionid=$data1->id;
        //  //dd($id);
        // $data2=DB::table('questions')->join('users', 'users.id', '=', 'questions.user_id')->select('users.profile_pic','users.name')->where('questions.id',"=",$questionid)->where('users.id', "=",$userid)->get();
        // $data=array_merge($data1->toArray(),$data2->toArray());
        //dd($data);
        return view('layouts.questiondetail')->with(['userdata'=>$userdata])->with(['data'=>$data]);
    }
    public function search(Request $request)
    {
        //print_r($request);
        //dd($request->all());
         $abc=$request->search;
        // // echo $abc;
         $resultquestion= Question::where('question', "Like","%$abc%")->where('discription', "Like","%$abc%")->where('tags', "Like","%$abc%")->where('user_id', "Like","%$abc%")->get();
    
         echo view('admin.questiontable',compact('resultquestion'));


        //$inputData = $request->all();
        //return response()->json($resultquestion);
    }
    public function details($id,Question $question,User $user)
    {
        $questiondetails=$question->find($id);
        // $uid=$questiondetails->user_id;
        // $userdata=$user->find($uid);
       // dd($questiondetails);
        return response()->json($questiondetails);
        
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

     public function store(Question $question,Request $request)
     {
        //dd($request);
         $request->validate([
            'user_id'=>'required',
             'question'=>'required',
             'tags'=>'required',
             
             'discription'=>'required'
         ]);
         if($request->permit="on"){
                    $permit="Y";
                }else{
                    $permit="N";
                }
         $question->user_id=$request->user_id;
         $question->question=$request->question;
         $question->tags=$request->tags;
         $question->discription=$request->discription;
         $question->permit=$permit;
 
         $question->save();
        //  echo "<pre>";
        //  print_r($request->all());
         return redirect('/allquestion');
     }


    // public function store(Question $question,Request $request)
    // {
    //     // $id=Auth::user()->name;
    //     echo "<pre>";
    //     print_r($request->all());
    //     // $request->validate([
    //     //     'question'=>'required',
    //     //     'tags'=>'required',
    //     //     'discription'=>'required'
    //     // ]);
    //     // if($request->permit='on'){
    //     //     $permit="1";
    //     // }else{
    //     //     $permit="2";
    //     // }
    //     // $question->user_id=$id;
    //     // $question->question=$request->question;
    //     // $question->tags=$request->tags;
    //     // $question->discription=$request->discription;
    //     // $question->permit=$permit;

    //     //  echo $question->save();
    //     // echo "<pre>";
    //     // print_r($request->all());
    //     // return redirect('/questions');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question,User $user)
    {
        $questiondata=DB::table('questions')
                    ->join('users', 'users.id', '=', 'questions.user_id')
                    ->select('questions.*', 'users.profile_pic','users.name')->get();
       
        echo $questiondata;
        //echo $userdata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($question_id,Question $question)
    {
        $questionbyid=$question->find($question_id);
        // echo $questionbyid;
        echo $questionbyid->delete();
    }
}
