<?php

namespace App\Http\Controllers;
use App\Models\User;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('layouts.register');
    }
    public function login()
    {
        return view("layouts.login");
    }
    public function dashboard()
    {
        return view('layouts.dashboard');
    }
    public function logout()
    {
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
        //dd($request);
        $credentials = $request->only('email', 'password');

        
        // dd(Auth::attempt($credentials));
        if(Auth::attempt($credentials))
        {
            // dd($request);
            $user = Auth::user();
           if($user->role_id)
           {
                return redirect('dashboard');
           }
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
        $user->save();
        return redirect('login');

    }
}
