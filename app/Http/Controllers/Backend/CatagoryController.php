<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Catagory;
use App\Model\Backend\Subcatagory;
use Illuminate\Http\Request;
use Str;
use Image;

class CatagoryController extends Controller
{
    function index(){
        $catagories = Catagory::all();
        return view('Backend/product_management/catagory/catagory',compact('catagories'));
    }

    function post(Request $request){
        $request->validate([
            'catagory_img' => 'required',
            'catagory_name' => 'required',
        ]);
        if($request->hasFile('catagory_img')){
            $get_image = $request->file('catagory_img');
            $image = Str::random(10).".".$get_image->getClientOriginalExtension();
            Image::make($get_image)->save(public_path('/backend/img/catagory/'.$image));
            Catagory::insert([
                'catagory_img'=>'backend/img/catagory/'.$image,
                'catagory_name'=>$request->catagory_name
            ]);

        }
        else{
            $image = 'default.png';
            Catagory::insert([
                'catagory_img'=>'backend/img/catagory/'.$image,
                'catagory_name'=>$request->catagory_name
            ]);
        }
        return redirect(route('catagory.index'))->with('success','Catagory Added');
    }
    function edit($id){
        $catagory = Catagory::where('id',$id)->first();
        return view('Backend/product_management/catagory/edit_catagory',compact('catagory'));
    }
    function update(Request $request,$id){
        $icon =Catagory::where('id',$id)->first();
         $icon_img =$icon->catagory_img;

        if($request->hasFile('catagory_img')){
            $get_image = $request->file('catagory_img');
            $image = Str::random(10).".".$get_image->getClientOriginalExtension();
            Image::make($get_image)->save(public_path('/backend/img/catagory/'.$image));

            if(file_exists($icon_img)){
                unlink($icon_img);
             }
            Catagory::findOrFail($id)->update([
                'catagory_img'=>'backend/img/catagory/'.$image,
                'catagory_name'=>$request->catagory_name
            ]);
        }
        else{
            Catagory::findOrFail($id)->update([
                'catagory_name'=>$request->catagory_name
            ]);
        }
        return redirect(route('catagory.index'))->with('success','Catagory Updated');
    }

    function destroy($id){
        $delete = Catagory::findOrFail($id)->catagory_img;
        unlink($delete);
        Catagory::findOrFail($id)->delete();
        // Subcatagory::where('catagory_id',$id)->delete();
        // Product::where('catagory_id',$id)->delete();


        return back()->with('delete','Product Deleted successfully');
    }

}
