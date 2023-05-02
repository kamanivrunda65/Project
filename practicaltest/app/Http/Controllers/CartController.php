<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product,Cart $cart)
    {
        // $data=DB::table('carts')->select('products.product_name',"products.stock",'carts.*')->join('products',"products.id","=","carts.product_id")->get();
        return view('layouts.cart');
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
    public function store($id,Request $request,Cart $cart,Product $product)
    {
        $cart->product_id=$id;
        $productdata=$product->find($id);
        $cart->quantity=1;
        $cart->total_price=$productdata->price;
        echo $cart->save();
        // return redirect('cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        $data=DB::table('carts')->select('products.product_name',"products.stock",'carts.*')->join('products',"products.id","=","carts.product_id")->get();
        echo $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function deleteall(Cart $cart)
    {
        $cartdata=$cart->all();
        foreach($cartdata as $data){
            $data->delete();
        }
        echo $cartdata;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart,Product $product)
    {
        //dd($request);
        $request->validate([
            'cart_id'=>'required',
            'quantity'=>'required'
        ]);
        $cid=$request->cart_id;
        $cartdata=$cart->find($cid);
        $pid=$cartdata->product_id;
        $productdata=$product->find($pid);
        $pprice=$productdata->price;
        $total=$pprice*$request->quantity;
        // dd($total);
        $cartdata->total_price=$total;
        $cartdata->quantity=$request->quantity;
        $cartdata->save();
        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,Cart $cart)
    {
        $cartdata=$cart->find($id);
        echo $cartdata->delete();
    }
}
