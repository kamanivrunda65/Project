<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\Blog;
use App\Models\User;
use App\Models\Review;
use App\Models\Category;
use App\Models\Question;
use App\Models\Notification;
use App\Mail\Passwordmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function profile($name,User $user ,Blog $blog)
    {
        // dd($name);
        $userid=$user->where("name","=","$name")->value('id');
        $userbyid=$user->find($userid);
        if(Auth::check())
        {
            $uid=Auth::user()->id;
            return View::make('layouts.profile')->with('userbyid', $userbyid)->with('authuserid',$uid);
        }
        return View::make('layouts.profile')->with('userbyid', $userbyid)->with('authuserid',0);
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
    public function resetpassword($email)
    {
        //dd($email);
        // $session=session()->all();
        // dd($session);
        return view('layouts.resetpassword')->with(['emailid'=>$email]);
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
             'password'=>'required|confirmed|min:8',
             'password_confirmation'=>'required|min:8'
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
   public function sendpasswordmail(Request $request,User $user)
   {
        // dd($request);
        $request->validate([
            'email'=>'required|email',
        ]);
        $user = User::where('email', $request->email)->first();
        // $token = mt_rand(100000, 999999);
        // Cache::put('password_reset_' . $user->id, $token, now()->addMinutes(10));
        $emailid=$request->email;
        // $data=$request->session()->put('user_data', $value);
        // Session::put('useremaildata',$value);
        // $value=Auth::user()->id;
        // $emailid=session()->get('useremaildata');
        $passwordmailData = [
            'title' => 'Mail from GET_UNSTACK',
            'body' => 'This is for verify your Email',
            'email'=>$emailid,
        ];

        Mail::to('kamanivrunda65@gmail.com')->send(new Passwordmail($passwordmailData));
        // echo $data;
        // dd('Email send successfully.');
        return redirect('/forgotpassword');
   }
   public function resetpassworddata(Request $request,User $user)
   {
        //dd($request);
        $request->validate([
            'user_email'=>'required',
             'password'=>'required|confirmed|min:8',
             'password_confirmation'=>'required|min:8'
         ]);
        //  dd($request);
        $userid=$user->where('email',"=","$request->user_email")->value('id');
        //dd($userid);
        $userdata=$user->find($userid);
        $pass=Hash::make($request->password);
        //dd($pass);
        $userdata->password=$pass;
        $userdata->save();
        return redirect('login');

   }
   public function review(Request $request,Review $review,User $user)
   {
        // dd(Auth::user());
        $request->validate([
            'user_id'=>'required',
            'review'=>'required'
        ]);
        $review->user_id=$request->user_id;
        $review->review=$request->review;
        $userdata=$user->find($request->user_id);
        // dd($userdata);
        // $userdata->user_review=1;
        // $userdata->save();
        // $review->save();
        return redirect('/home');
   }
   public function dropreview($uid,Request $request,Review $review,User $user)
   {
        $reviewid=$review->where('user_id',"=","$uid")->value('id');
        $reviewdata=$review->find($reviewid);
        $userdata=$user->find($uid);
        $userdata->user_review=0;
        // dd($userdata);
        $userdata->save();
        $reviewdata->delete();
   }
   public function notificationdata(User $user,Notification $notification)
   {
        $data=$notification->orderby('id')->get();
        echo $data;
   }
   public function linkopen($id,Notification $notification)
   {
        $ndata=$notification->find($id);
        $ndata->read_at=now();
        $ndata->status=1;
        echo $ndata->save();
   }
}

