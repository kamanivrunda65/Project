<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addproduct(Category $category)
    {
        $categorydata=$category->get();
        return view('layouts.addproduct')->with(['data'=>$categorydata]);
    }
    public function showproduct(Category $category,Product $product)
    {
        $data=DB::table('products')->select('products.*','categories.category_name')->join('categories','categories.id',"=","products.category_id")->get();
        return view('layouts.showproduct')->with(['productdata'=>$data]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Product $product)
    {
        //dd($request);
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:jpeg,jpg'
        ]);
        //dd($request);
        $image=$request->file('image');
        //  dd($image);
        $filename=time()."-product-".$image->getClientOriginalName();
        $image->move(base_path('public\asset\image'),$filename);
        $file="image/".$filename;
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->category_id=$request->category;
        $product->image=$file;
        //dd($product);
        $product->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,Product $product,Category $category)
    {
        $productdata=$product->find($id);
        $categorydata=$category->get();
        // dd($id);
        return view('layouts.editproduct')->with(['productdata'=>$productdata])->with(['data'=>$categorydata]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //dd($request);
        $request->validate([
            'product_id'=>'required',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:jpeg,jpg'
        ]);
        //dd($request);
        $pdata=$product->find($request->product_id);
        $image=$request->file('image');
        //  dd($image);
        $filename=time()."-product-".$image->getClientOriginalName();
        $image->move(base_path('public\asset\image'),$filename);
        $file="image/".$filename;
        $pdata->product_name=$request->product_name;
        $pdata->description=$request->description;
        $pdata->price=$request->price;
        $pdata->category_id=$request->category;
        $pdata->image=$file;
        //dd($product);
        $pdata->save();
        return redirect('showproduct');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,Product $product)
    {
        //dd($id);
        $data=$product->find($id);
        $data->delete();
        return redirect('showproduct');
    }
    public function search(Request $request,Product $product,Category $category)
    {
        // dd($request);
        $request->validate([
            
            'search' => 'required'
        ]);
        $search=$request->search;
        $data=DB::table('products')->join('categories','categories.id',"=","products.category_id")->where('product_name',"LIKE","%$search%")
        ->orwhere('description',"LIKE","%$search%")->select('products.*','categories.category_name')->get();
        // dd($data);
        return view('layouts.showproduct')->with(['productdata'=>$data]);
    }
}
