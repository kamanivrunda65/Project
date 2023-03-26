<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id==1) {
            // Show a JavaScript confirm box to redirect to the dashboard or stay on the homepage
            return view('layouts.index')->with('confirmBox', true);
        }
        
            return view('layouts.index');
    }
    
    public function contact()
    {
        return view('layouts.contact');
    }
}
