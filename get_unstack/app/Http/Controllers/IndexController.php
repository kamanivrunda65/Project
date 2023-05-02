<?php

namespace App\Http\Controllers;
// use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
class IndexController extends Controller
{
    // use Notifiable;
    public function index()
    {
        if(Auth::check()){
        if (Auth::user()->role_id==1) {
            // Show a JavaScript confirm box to redirect to the dashboard or stay on the homepage
            return view('layouts.index')->with('confirmBox', true);
        }
    }
            return view('layouts.index');
    }
    
    public function contact()
    {
        return view('layouts.contact');
    }
    public function achievement()
    {
        $blogdata=DB::table('blogs')->get();
        $totalblog=count($blogdata);
        $questiondata=DB::table('questions')->get();
        $totalquestion=count($questiondata);
        $answerdata=DB::table('answers')->get();
        $totalanswer=count($answerdata);
        $userdata=DB::table('users')->get();
        $totaluser=count($userdata);
        $a=array("blog"=>$totalblog,"question"=>$totalquestion,"answer"=>$totalanswer,"user"=>$totaluser);
        // dd($a);
        $object=json_decode(json_encode($a,false));
        // dd($object);
        return $object;
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('login');
      }
    public function loginuser(Request $request,User $user)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);
        
        $credentials = $request->only('email', 'password');

        //dd(Auth::attempt($credentials));

        if(Auth::attempt($credentials))
        {
            $request->session()->put('id',Auth::user()->id);
            //$data=session()->get('id');
            //dd($data);
            // $this->clearLoginAttempts($request);
            $user = Auth::user();
            $user->last_login = now();
            $user->save();
            toastr()->success('Login successfully!');
            return redirect('home');
        } else
        {
            return redirect('register');
        }
    }
    public function registeruser(Request $request,User $user)
    {
        $request->validate([
            'name'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:8|confirmed',
            'password_confirmation'     =>   'required|min:8'
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        //dd($user);
        //$user->save();
        return redirect('login');

    }
}
