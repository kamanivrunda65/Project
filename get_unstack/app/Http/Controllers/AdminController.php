<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.admindashboard');
    }
    public function questiontable()
    {
        return view('admin.questiontable');
    }
    public function blogtable()
    {
        return view('admin.blogtable');
    }
    public function category()
    {
        return view('admin.addcategory');
    }
   
}
