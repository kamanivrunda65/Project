<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Redirect;
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
    public function trending(Question $question)
    {
        $questiondata=DB::table('questions')->select("questions.*","users.name")->join('users',"users.id","=","questions.user_id")->orderby('views','DESC')->take(3)->get();
        echo $questiondata;
    }
    public function singlequestion($id,Question $question,User $user,Cart $cart)
    {
         $data=$question->find($id);
         //dd($data1);
         $userid=$data->user_id;
         $userdata=$user->find($userid);
         
         
         $viewers=$data->views;
         $viewer=$viewers+1;
         $data->views=$viewer;
         $data->save();
        if(Auth::check())
        {
            $userbyid=Auth::user()->id;
            $cartid=$cart->where('question_id',"=","$id")->where("user_id","=","$userbyid")->value('id');
            //dd($cartid);
            if($cartid!=null)
            {
                return view('layouts.questiondetail')->with(['userdata'=>$userdata])->with(['data'=>$data])->with(['cart'=>'1'])->with(['authdata'=>$userbyid]);
            }
            else
            {
                return view('layouts.questiondetail')->with(['userdata'=>$userdata])->with(['data'=>$data])->with(['cart'=>'0'])->with(['authdata'=>$userbyid]);
            }
           
        }
        return view('layouts.questiondetail')->with(['userdata'=>$userdata])->with(['data'=>$data])->with(['cart'=>'0'])->with(['authdata'=>'0']);
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
    public function show(Question $question,User $user,Request $request)
    {   
        $condition = $request->condition;
        $tag = $request->tag;
        if($tag!=null){
            $tagname=$tag;
        }
        else{
            $tagname="";
        }
        if($condition=='new')
        {
            $colum="id";
            $order="DESC";
        }
        if($condition=="vote")
        {
            $colum="votes";
            $order="DESC";
        }
        if($condition=="view")
        {
            $colum="views";
            $order="DESC";
        }
        if($condition=="unanswer")
        {
            $colum="answers";
            $order="ASC";
        }
        $perPage = request()->query('perPage', 10);
        $page = request()->query('page', 1);
        $offset = ($page - 1) * $perPage;
        $data1=$question->where('tags',"LIKE","%$tagname%")->get();
        $data=DB::table('questions')
                    ->join('users', 'users.id', '=', 'questions.user_id')
                    ->select('questions.*', 'users.profile_pic','users.name')->where('tags',"LIKE","%$tagname%",)->orderby($colum,$order)->offset($offset)->limit($perPage)->get();
       $total = $data1->count();
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
    public function searchquestion(Request $request,Question $question)
    {
        // dd($request);
        $request->validate([
            'searchquestion'=>'required',
        ]);
        $searchWords = explode(' ', $request->searchquestion);
        $allquestions = Question::all();
        $matchingQuestions = [];
        $count=0;
        foreach ($allquestions as $questions) {
            $questionWords = explode(' ', $questions->question);
            
            $a=array_intersect($searchWords,$questionWords);
            // echo $searchWords;
            // echo $questionWords;
            // dd($a);
            $similarity=count($a);
          
            if($count<$similarity)
            {
                $count=$similarity;
                $id=$questions->id;
            }
            
        }
        return $id;
        // $matchingQuestions["$id"]=
        // array_push($matchingQuestions,"$id"=>"$count");
        // $key=array_keys($matchingQuestions['0']);
        // echo $qid;
        // $que=$question->find($id);
        // return redirect("/questiondetail/{$id}");
        return Redirect::to("http://localhost:8000/questiondetail/$id");
    }
}
