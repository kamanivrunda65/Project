<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App\Mail\Passwordmail;
class ProfileController extends Controller
{
   
    public function profile($name,User $user ,Blog $blog)
    {
        // dd($name);
        $userid=$user->where("name","=","$name")->value('id');
        $userbyid=$user->find($userid);
       // return view('layouts.profile')->with(['userbyid',$userbyid]);
        return View::make('layouts.profile')->with('userbyid', $userbyid);
    }
    public function change()
    {
        return view('layouts.change_password');
    }
    public function notification()
    {
        return view('layouts.notification');
    }
    public function setting()
    {
        return view('layouts.setting');
    }
    public function forgotpassword()
    {
        return view('layouts.forgotpassword');
    }
    public function resetpassword()
    {
        return view('layouts.resetpassword');
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
        //dd($request);
            $request->validate([
            'user_id'=>'required',
             'user_password'=>'required',
             'current_password'=>'required',
             'password'=>'required|confirmed',
             'password_confirmation'=>'required'
         ]);
         //dd($request);
         $uid=$request->user_id;
         $userbyid=$user->find($uid);
         $pass=$request->current_password;
         $userpass=$request->user_password;
        if(Hash::check($pass,$userpass))
        {
            
                $userbyid->password=Hash::make($request->password);
                //dd($userbyid);
                $userbyid->save();
                return view('layouts.change_password')->with('alertBox', true);
        }
        return view('layouts.change_password')->with('alertwrong', true);
         //dd($request->all());
        
    }
    public function changeemail(Request $request,User $user)
    {
        // dd($request->all());
        $request->validate([
            'user_id'=>'required',
             'email'=>'required|email'
         ]);
         $uid=$request->user_id;
         $userbyid=$user->find($uid);
        $userbyid->email=$request->email;
        $userbyid->save();
        
        return redirect('profile');
        //dd($request);
    }
   public function userblog(User $user,Blog $blog,Category $category)
   {
        $blogdata=DB::table('blogs')->join('users', 'users.id', '=', 'blogs.user_id')->join('categories','categories.id','=','blogs.category')
        ->select('blogs.*', 'users.profile_pic','users.name','categories.categoryname')
        ->orderby('id','DESC')->get();       
        echo $blogdata;
   }
   public function userquestion(Question $question)
   {
        $questiondata=DB::table('questions')->orderby('id','DESC')->get();
        // dd();
        echo $questiondata;
   }
   public function useranswers()
   {
        $answerdata=DB::table('answers')->orderby('id','DESC')->get();
        echo $answerdata;
   }
   public function sendpasswordmail(Request $request)
   {
        // dd($request);
        $passwordmailData = [
            'title' => 'Mail from GET_UNSTACK',
            'body' => 'This is for verify your Email',
        ];

        Mail::to('kamanivrunda65@gmail.com')->send(new Passwordmail($passwordmailData));

        // dd('Email send successfully.');
        return redirect('/home');
   }
   public function resetpassworddata(Request $request,User $user)
   {
        dd($request);
   }
}

