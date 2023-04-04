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
         $viewers=$question->views;
         $viewers=$viewers+1;
         $data->views=$viewers;
         $data->save();
        
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

     public function store(Question $question,Request $request,User $user)
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


         $uid=$request->user_id;
        $userbyid=$user->find($uid);
        $totalquestion=$userbyid->total_question;
        $totalquestion=$totalquestion+1;
        $userbyid->total_question=$totalquestion;
        
        $tag=strtolower($request->tags);
        $tagdata=explode(',',$tag);
        foreach($tagdata as $tag){
            $tagid=DB::table('tags')->where('tagname',"=","$tag")->value('id');
            if($tagid==null)
            {
                $tags->tagname=$tag;
                $tags->total_question=1;
                $tag->save();
            }
            if($tagid!=null)
            {
                $tagdata=$tags->find($tagid);
                $totalquestion=$tagdata->total_question;
                $totalquestion=$totalquestion+1;
                $tagdata->total_question=$totalquestion;
                $tagdata->save();
            }
        }
        
        
        $userbyid->save();
         $question->save();
        //  echo "<pre>";
        //  print_r($request->all());
         return redirect('/allquestion');
     }


    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question,User $user)
    {
        $perPage = request()->query('perPage', 10);
        $page = request()->query('page', 1);
        $offset = ($page - 1) * $perPage;
        $data=DB::table('questions')
                    ->join('users', 'users.id', '=', 'questions.user_id')
                    ->select('questions.*', 'users.profile_pic','users.name')->orderby('id','DESC')->offset($offset)->limit($perPage)->get();
       $total = DB::table('questions')->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'perPage' => $perPage,
            'page' => $page,
        ]);
        //echo $questiondata;
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
    public function destroy($question_id,Question $question,User $user)
    {
        $questionbyid=$question->find($question_id);
        $uid=$questionbyid->user_id;
        
        $userbyid=$user->find($uid);
        $totalquestion=$userbyid->total_question;
        $totalquestion=$totalquestion-1;
        $userbyid->total_question=$totalquestion;

        $tagarray=$questionbyid->tags;
        $tagdata=explode(",",$tagarray);
        foreach($tagarray as $tag){
            $tagid=DB::table('tags')->where('tagname',"=","$tag")->value('id');
            $tagdata=$tags->find($tagid);
            $totalblog=$tagdata->total_question;
            $totalquestion=$totalquestion-1;
            $tagdata->total_question=$totalquestion;
            $tagdata->save();

        }

        $userbyid->save();

        // echo $questionbyid;
        echo $questionbyid->delete();
    }
}
