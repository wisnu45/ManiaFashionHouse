<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\WishList;
use App\Model\Backend\Cart;
use App\Model\Backend\ColorSize;
use App\Model\Backend\Product;


class WishListController extends Controller
{
   function index(){
       $wishlists = WishList::all();
       $varients = ColorSize::all();
       return view('frontend/wishlist',compact('wishlists','varients'));
   }


   function store($id){
    $MAC = exec('getmac');
    $MAC = strtok($MAC, ' ');

    $cart = WishList::where('product_id',$id)->where('mac_address',$MAC)->exists();



    if($cart){
      return back()->with('success','Already exist on wishlist');
    }
    else{
       WishList::insert([
          'product_id'=> $id,
          'mac_address' =>$MAC,
       ]);
    }
    return back()->with('success','Listed on wishlist Successfully');

   }

   function WishToCart($id){
    $MAC = exec('getmac');
    $MAC = strtok($MAC, ' ');

    $cart = Cart::where('product_id',$id)->where('mac_address',$MAC)->exists();

    $product = Product::where('id',$id)->first();
    $product_price = $product->price;

    if($cart){
       Cart::where('product_id',$id)->where('mac_address',$MAC)->increment('quantity',1);
       Cart::where('product_id',$id)->where('mac_address',$MAC)->increment('totall',$product_price);
       WishList::where('product_id',$id)->where('mac_address',$MAC)->delete();
    }
    else{
       Cart::insert([
          'product_id'=> $id,
          'quantity' =>1,
          'mac_address' =>$MAC,
          'totall'=>$product_price,
       ]);
       WishList::where('product_id',$id)->where('mac_address',$MAC)->delete();
    }
    return back()->with('success','product Carted successfully');
   }
   function destroy($id){
      $MAC = exec('getmac');
      $MAC = strtok($MAC, ' ');
      WishList::where('id',$id)->where('mac_address',$MAC)->delete();
      return back()->with('success','successfully Deleted');
   }
   function abijabi(){
       return view('Frontend.Checkout.invoice');
   }
}
