<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Cart;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cartquestionstore($qid,$uid,Request $request,Cart $cart)
    {
        $cart->user_id=$uid;
        $cart->question_id=$qid;
        echo $cart->save();
        // return redirect()->back();
        // return redirect('singlequestion');
    }
    public function usersavedquestion($userid,Question $question,Cart $cart,User $user)
    {
        // $userid=Auth::user()->id;
        $data=DB::table('carts')->join("questions","questions.id","=","carts.question_id")->join("users","users.id","=","questions.user_id")
        ->select('carts.*','questions.question','questions.created_at','questions.answers','questions.tags','questions.views','users.name')
        ->where("carts.user_id","=","$userid")->orderby('carts.id','DESC')->get();
        echo $data;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function cartquestiondrop($qcid,Cart $cart)
    {
        // dd($qcid);
        $cartdata=$cart->find($qcid);
        echo $cartdata->delete();
        // return redirect('singlequestion');
    }
    
}
