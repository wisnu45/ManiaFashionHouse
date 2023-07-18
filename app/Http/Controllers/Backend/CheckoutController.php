<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Billing;
use App\Model\Backend\Cart;
use App\Model\Backend\District;
use Illuminate\Http\Request;
use App\Model\Backend\Division;
use App\Model\Backend\Order;
use App\Model\Backend\Product;
use App\Model\Backend\Sale;
use App\Model\Backend\Shipping;
use App\Model\Backend\Union;
use App\Model\Backend\Upazila;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    function index(){
        $division = Division::all();
        $district = District::all();
        $upazila = Upazila::all();
        $union = Union::all();
        return view('Frontend.Checkout.checkout',compact('division','district','upazila','union'));
    }
    function store(Request $request){


        $shipping_id = Shipping::insertGetId([
            'user_id'=>Auth::id(),
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
            'grandTotal'=>100,
            'transaction_id'=>$request->transaction_id,
            'cash_on_deliver'=>$request->cash_on_deliver,
            'created_at'=>Carbon::now(),
        ]);
        $sales_id= Sale::insertGetId([
                      "user_id"=>Auth::id(),
                      "shipping_id"=>$shipping_id,
                      "grand_totall"=>"1400"
                  ]);

        $MAC = exec('getmac');
        $MAC = strtok($MAC, ' ');

        $is_cart = Cart::where('mac_address',$MAC)->exists();
        $carts = Cart::where('mac_address',$MAC)->get();
            if($is_cart){
                foreach($carts as $cart){
                    Billing::insert([
                        "user_id"=>Auth::id(),
                        "sale_id"=>$sales_id,
                        "product_id"=>$cart->product_id,
                        "product_quantity"=>$cart->quantity,
                        "price"=>$cart->productItem->product_price,
                        "payment_mathod"=>'Cash',
                        "created_at"=>Carbon::now()
                    ]);
                   Product::where('id',$cart->product_id)->decrement('quantity',$cart->quantity);
                    Cart::where('product_id',$cart->product_id)->delete();
                 }

            }
            else{
                return back()->with('No cart item available');
            }


            return back();

        // $email = $request->email;
        // Mail::send('Frontend/Checkout/invoice',array('billing_id'=>$billing_id), function($message) use($email) {
        //     $message->to($email, 'Invoice')->subject
        //        ("Product Invoice");
        //     $message->from('dhhasansaha11@gmail.com','Alamin Fashion House');
        //  });
        // return back();
    }

    function shippedProduct($id){
        Order::where('billing_id',$id)->update([
            'shipping_process'=>1,
        ]);
        return redirect('/');
    }

}



// function stripe_submit(Request $request){

//     $shipping_id =   shipping::insertGetId([
//           "user_id"=>Auth::id(),
//           "fname"=>$request->fname,
//           "lname"=>$request->lname,
//           "company_name"=>$request->company_name,
//           "country_id"=>$request->country_id,
//           "city_id"=>$request->city_id,
//           "state_id"=>$request->state_id,
//           "address"=>$request->address,
//           "zip_code"=>$request->zip_code,
//           "phone"=>$request->phone,
//           "email"=>$request->email,
//           "payment_status"=>'pending',
//       ]);

//      $sales_id= Sale::insertGetId([
//           "user_id"=>Auth::id(),
//           "shipping_id"=>$shipping_id,
//           "grand_totall"=>"1400"
//       ]);

//       Stripe\Stripe::setApiKey('sk_test_pggpOl1FECwCoLsgXDTQjtjF00An8mKwrj');

//       $charge = Stripe\Charge::create ([
//                "amount" => 100 * 1400,
//                "currency" => "usd",
//                "source" => 'tok_visa',
//                "description" => "Test payment from itsolutionstuff.com."
//        ]);
//           Session::flash('success', 'Payment successful!');


//           $MAC = exec('getmac');
//           $MAC = strtok($MAC, ' ');
//           $single_cart = CartModel::where('mac_address',$MAC)->get();

//           foreach($single_cart as $item){
//               billing::insert([
//                   "user_id"=>Auth::id(),
//                   "sale_id"=>$sales_id,
//                   "product_id"=>$item->product_id,
//                   "product_quantity"=>$item->quantity,
//                   "price"=>$item->product->product_price,
//                   "payment_mathod"=>$charge->source->brand,
//                   "created_at"=>Carbon::now()
//               ]);

//               ProductModel::findOrFail($item->product_id)->decrement('product_quantity',$item->quantity);
//               $item->delete();

//           }

//           return redirect('/');
