<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Product;
use App\Model\Backend\Cart;
use App\Model\Backend\ColorSize;
use App\Model\Backend\Coupon;
use Carbon\Carbon;


class CartController extends Controller
{
   function index(Request $request){
      $carts = Cart::all();
      $getCoupon = $request->coupon_code;
      $coupon = Coupon::where('status',1)->first();
      $start_date = $coupon->start_date;
      $end_date = $coupon->end_date;
      $coupon_code = $coupon->coupon_code;
      $now = Carbon::now();
      $is_coupon = Coupon::where('status',1)->exists();


      if($is_coupon && $getCoupon == $coupon_code && $end_date >= $now && $end_date > $start_date  ){
         $discount = $coupon->discount;
         $total = 0;
         foreach($carts as $key =>$cart){
            $total += $cart->totall;
         }
         $grandTotal = $total-$total*$discount/100;
         $TotalValue = session('grandTotal', $grandTotal);
         return view('Frontend.cart',compact('carts','discount','total','grandTotal'));
      }
      else{
         $discount = 0;
         $total = 0;
         foreach($carts as $key =>$cart){
            $total += $cart->totall;
         }
         $grandTotal = $total-$total*$discount/100;
         $TotalValue = session('grandTotal', $grandTotal);
        //  session(['ddd' => $grandTotal]);
         return view('Frontend.cart',compact('carts','discount','total','grandTotal'));
      }

   }

   function Qstore($id){
    $MAC = exec('getmac');
    $MAC = strtok($MAC, ' ');

    $cart = Cart::where('product_id',$id)->where('mac_address',$MAC)->exists();

    $product = Product::where('id',$id)->first();
    $product_price = $product->price;

    if($cart){
       Cart::where('product_id',$id)->where('mac_address',$MAC)->increment('quantity',1);
       Cart::where('product_id',$id)->where('mac_address',$MAC)->increment('totall',$product_price);
    }
    else{
       Cart::insert([
          'product_id'=> $id,
          'mac_address' =>$MAC,
          'quantity' =>1,
          'totall'=>$product_price,
          'created_at'=>Carbon::now(),
       ]);
    }
    return back()->with('success','product Carted successfully');
   }

   function store($id, Request $request){

      $MAC = exec('getmac');
      $MAC = strtok($MAC, ' ');

      $cart = Cart::where('product_id',$id)->where('mac_address',$MAC)->exists();

      $product = Product::where('id',$id)->first();
      $product_price = $product->price;

      if($cart){
         Cart::where('product_id',$id)->where('mac_address',$MAC)->increment('quantity',$request->quantity);
         Cart::where('product_id',$id)->where('mac_address',$MAC)->increment('totall',$product_price*$request->quantity);
      }
      else{
         Cart::insert([
            'product_id'=> $id,
            'color' =>$request->color,
            'size' =>$request->size,
            'quantity' =>$request->quantity,
            'mac_address' =>$MAC,
            'totall'=>$product_price * $request->quantity,
            'created_at'=>Carbon::now(),
         ]);
      }
      return back()->with('success','product Carted successfully');
   }


   function update(Request $request){
          foreach ($request->cart_id as $key => $value) {
             $carts = Cart::findOrFail($value)->get();
               $price = $carts[$key]->productItem->price;
              Cart::findOrFail($value)->update([
                  'quantity' => $request->quantity[$key],
                  'totall'=>$price*$request->quantity[$key]
              ]);

          }
          return back()->with('success','product Updated successfully');

   }

   function destroy($id){
      $MAC = exec('getmac');
      $MAC = strtok($MAC, ' ');
      Cart::where('id',$id)->where('mac_address',$MAC)->delete();
      return back()->with('success','successfully Deleted');
   }
   function Clear(){
      $MAC = exec('getmac');
      $MAC = strtok($MAC, ' ');
      Cart::where('mac_address',$MAC)->delete();
      return back()->with('success','successfully Deleted');
   }

   // coupon


}
