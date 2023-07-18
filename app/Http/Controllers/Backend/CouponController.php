<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function index(){
        $coupons = Coupon::all();
        return view('Backend.product_management.Coupon.coupon_index',compact('coupons'));
    }
    function create(){
        return view('Backend.product_management.Coupon.coupon_create');
    }
    function store(Request $request){
        Coupon::insert([
            'coupon_title'=>$request->coupon_title,
            'coupon_code'=>$request->coupon_code,
            'discount'=>$request->discount,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status,
            'created_at'=>Carbon::now(),
        ]);
        return redirect(route('coupon_ctlr.index'));
    }
    function destroy($id){
        Coupon::findOrFail($id)->delete();
        return back()->with('delete','Deleted Successfully');
    }
    function update(Request $request, $id){
        Coupon::findOrFail($id)->update([
            'coupon_title'=>$request->coupon_title,
            'coupon_code'=>$request->coupon_code,
            'discount'=>$request->discount,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status,

        ]);
        return back()->with('edited','Edited Successfully');
    }
}
