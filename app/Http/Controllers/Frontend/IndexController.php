<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Blog;
use App\Model\Backend\Catagory;
use App\Model\Backend\ColorSize;
use App\Model\Backend\Product;
use App\Model\Backend\Product_Reviews;
use App\Model\Backend\Subcatagory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    function index(){
        $catagories = Catagory::all();
        $products = Product::orderBy('id','desc')->take(9)->get();
        $varients = ColorSize::all();
        $subcats = Subcatagory::all();
        $blogs = Blog::all();
        return view('Frontend.Home',compact('catagories','products','varients','subcats','blogs'));
    }
    function product_details($slug){
        $product = Product::where('slug',$slug)->first();
        $reviews = Product_Reviews::where('slug',$slug)->get();
        $products = Product::where('catagory_id',$product->catagory_id)->get();
        $varients = ColorSize::all();
        $subcats = Subcatagory::all();
        return view('Frontend.product_details',compact('product','reviews','products','varients','subcats'));
    }
    function ProductReviews(Request $request){
       Product_Reviews::insert([
        'user_id'=>Auth::id(),
        'product_id'=>$request->product_id,
        'fname'=>$request->fname,
        'email'=>$request->email,
        'comments'=>$request->comments,
        'slug'=>$request->slug,
        'created_at'=>Carbon::now(),
       ]);
       return back();
    }
}
