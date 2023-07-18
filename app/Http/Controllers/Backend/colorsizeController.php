<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\ColorSize;
use App\Model\Backend\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class colorsizeController extends Controller
{
    function index(){
        $products = Product::all();
        $colors = ColorSize::all();
        return view('Backend.product_management.color&size.colors',compact('colors','products'));
    }
    function create(){
        $products = Product::orderBy('id','desc')->get();
        return view('Backend.product_management.color&size.create_color',compact('products'));
    }
    function store(Request $request){
        ColorSize::insert([
            'product_id'=>$request->product_id,
            'color'=>$request->color,
            'size'=>$request->size,
            'quantity'=>$request->quantity,
            'created_at'=>Carbon::now(),
        ]);
        return redirect(route('color.index'));
    }
    function update($id,Request $request){
        ColorSize::findOrFail($id)->update([
            'product_id'=>$request->product_id,
            'color'=>$request->color,
            'size'=>$request->size,
            'quantity'=>$request->quantity,
        ]);
        return redirect(route('color.index'));
    }
    function destroy($id){
        ColorSize::findOrFail($id)->delete();
        return back()->with('delete','Product Deleted successfully');
    }
}
