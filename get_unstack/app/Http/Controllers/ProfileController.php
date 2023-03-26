<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   
    public function profile()
    {
        return view('layouts.profile');
    }
    public function referral()
    {
        return view('layouts.referral');
    }
    public function notification()
    {
        return view('layouts.notification');
    }
    public function setting()
    {
        return view('layouts.setting');
    }
    public function show(User $user)
    {
        // $id=Auth::user()->id;
        // echo $id;
        // $userbyid=$user->get();
        // echo $userbyid;
    }
    public function updateuser(Request $request,User $user)
    {
        //dd($request->all());
        $request->validate([
            'user_id'=>'required',
             'profile_pic'=>'mimes:jpeg,jpg'
         ]);
         
        
         $user_id=$request->user_id;
         $userbyid=$user->find($user_id);

         if($request->file('profile_pic')!=null){
            $filename=time()."-profile.".$request->file('profile_pic')->getClientOriginalExtension();
            $request->file('profile_pic')->move(base_path('public\asset\assets\profile_pic'),$filename);
            $file="public/asset/assets/profile_pic/".$filename;
            $userbyid->profile_pic=$file;
           }
         $userbyid->name=$request->name;
         
         $userbyid->country=$request->country;
         $userbyid->objective=$request->objective;
         $userbyid->web_link=$request->web_link;
         $userbyid->insta_link=$request->insta_link;
         $userbyid->youtube_link=$request->youtube_link;
         $userbyid->github_link=$request->github_link;
         $userbyid->twitter_link=$request->twitter_link;
         $userbyid->facebook_link=$request->facebook_link;
        //  $user->update($userbyid);
        $userbyid->save();
         return redirect('/profile') ;
    }
    public function changepassword(Request $request,User $user)
    {
        // $id=$request->user_id;
        // $userbyid1=$user->find($id);
        // $cpass=Hash::make($request->current_password);
        // if($userbyid1->password==$cpass){
        //     echo "success";
        //     dd($request->all);
        // }
        // else{
        //     echo "fail";
        //     dd($userbyid1);
        // }
        // echo $questionbyid;
        //dd($userbyid1);
         dd($request->all());
        
    }
}
