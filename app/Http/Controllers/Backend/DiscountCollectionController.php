<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Catagory;
use App\Model\Backend\DiscountedCollection;
use App\Model\Backend\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Str;
class DiscountCollectionController extends Controller
{
    function index(){
        $disCollections = DiscountedCollection::all();
        $catagories = Catagory::all();

        return view('Backend.product_management.DiscountCollection.discountcollect',compact('disCollections','catagories'));
    }
    function create(){
        $products = Product::all();
        $catagories = Catagory::all();
        return view('Backend.product_management.DiscountCollection.dis_collection_create',compact('products','catagories'));
    }
    function store(Request $request){

        if( $request->hasFile('collection_img')){
            $get_image = $request->file('collection_img'); //orginal image;
                $image = Str::random(5).".".$get_image->getClientOriginalExtension();
                Image::make($get_image)->save(public_path('/backend/img/discount_collections/'.$image));
                DiscountedCollection::insert([
                    'collection_img'=>'backend/img/discount_collections/'.$image,
                    'collection_name'=>$request->collection_name,
                    'catagory_id'=>$request->catagory_id,
                    'product_id'=>json_encode($request->product_id),
                    'discount_title'=>$request->discount_title,
                    'discount'=>$request->discount,
                    'created_at'=>Carbon::now(),
                ]);
            }

        return back()->with('success','Successfully added');
    }
  function destroy($id){
    $delete = DiscountedCollection::findOrFail($id)->collection_img;
    if(file_exists($delete)){
        unlink($delete);
     }
     DiscountedCollection::findOrFail($id)->delete();
    return back()->with('delete','Discount Collection Deleted Successfully');
  }
}
