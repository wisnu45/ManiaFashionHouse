<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Catagory;
use App\Model\Backend\Product;
use App\Model\Backend\Subcatagory;
use Illuminate\Http\Request;

class SubcatagoryController extends Controller
{
    function index(){
        $catagories = Catagory::all();

        $subcatagories = Subcatagory::all();
        return view('Backend.product_management.subCatagory.subcatagory',compact('subcatagories','catagories'));
    }

    function store(Request $request){
        Subcatagory::insert([
            'subcatagory'=>$request->subcatagory,
            'catagory_id'=>$request->catagory_id
        ]);
        return redirect(route('subcatagory.index'))->with('success','Successfully Subcatagory Added');
    }


    function update(Request $request,$id){
        Subcatagory::findOrFail($id)->update([
            'catagory_id'=>$request->catagory_id,
            'subcatagory'=>$request->subcatagory,
        ]);
        return redirect(route('subcatagory.index'))->with('success','Subcatagory Updated');
    }

    function destroy($id){
        Subcatagory::findOrFail($id)->delete();
        // Product::where('subcatagory_id',$id)->delete();
        return back()->with('delete','Product Deleted successfully');
    }

}
