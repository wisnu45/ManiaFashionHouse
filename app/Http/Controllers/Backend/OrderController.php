<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Billing;
use App\Model\Backend\Catagory;
use App\Model\Backend\Checkout;
use App\Model\Backend\ColorSize;
use App\Model\Backend\District;
use App\Model\Backend\Division;
use App\Model\Backend\Order;
use App\Model\Backend\Product;
use App\Model\Backend\Sale;
use App\Model\Backend\Shipping;
use App\Model\Backend\Union;
use App\Model\Backend\Upazila;
use App\Model\Backent\custom_order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(){

        return view('Backend.Order.order');
    }
    function customOrderIndex(){
        $cstmOrders = custom_order::all();

        return view('Backend.Order.customOrderIndex',compact('cstmOrders'));
    }
    function create(){
        $catagories = Catagory::all();
        $products = Product::all();
        $colors = ColorSize::all();
        $division = Division::all();

        return view('Backend.Order.create_order',compact('products','colors','catagories','division'));
    }
    function OrderColorAzax($id){
        $colorsJson = ColorSize::where('product_id',$id)->get();
       return response()->json($colorsJson);
    }
    function storeAzax( $data){
        return response()->json($data);
    }
    function store(Request $request){

        custom_order::insert([
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'user_name'=>$request->user_name,
            'company_name'=>$request->company_name,
            'division'=>$request->division,
            'district'=>$request->district,
            'upozela'=>$request->upozela,
            'union'=>$request->union,
            'street_address'=>$request->street_address,
            'apartment'=>$request->apartment,
            'post_code'=>$request->post_code,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'payment_method'=>$request->payment_method,
            'grandTotal'=>1,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->route('custom.order')->with('success','Successfully added Order');
    }
    function divisionController($div_id){
        $district = District::where('division_id',$div_id)->get();
        return response()->json($district);
    }
    function UpozelaController($upzila_id){
        $upzila = Upazila::where('district_id',$upzila_id)->get();
        return response()->json($upzila);
    }
    function UnionController($upzila_id){
        $union = Union::where('upazilla_id',$upzila_id)->get();
        return response()->json($union);
    }
    function destroy($id){
        custom_order::FindOrFail($id)->delete();
        return back()->with('success','successfully deleted Items');
    }

}
