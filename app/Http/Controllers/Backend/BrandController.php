<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Brand;
use App\Model\Backend\Product;
use Illuminate\Http\Request;
use Image;
use Str;
class BrandController extends Controller
{
    function index(){
        $brands = Brand::all();
        return view('Backend.Brand.brand',compact('brands'));
    }

    function store(Request $request){

       //  insertion image
        if($request->hasFile('brand_img')){
            $get_image = $request->file('brand_img');
            $image = Str::random(10).".".$get_image->getClientOriginalExtension();
            Image::make($get_image)->resize(80, 80)->save(public_path('/backend/img/Brand/'.$image));
            Brand::insert([
                'brand_img'=>'backend/img/Brand/'.$image,
                'brand_name'=>$request->brand_name
            ]);
        }
        else{
            $image = 'default.png';
            Brand::insert([
                'brand_img'=>'backend/img/Brand/'.$image,
                'brand_name'=>$request->brand_name
            ]);
        }
        return redirect(route('brand.index'))->with('success','Brand added successfully');
    }

    function edit($id){
        $brand = Brand::where('id',$id)->first();
        return view('Backend.Brand.brand_edit',compact('brand'));
    }
    function update(Request $request, $id){
        $icon =Brand::where('id',$id)->first();
         $icon_img =$icon->brand_img;
         //  insertion image
         if($request->hasFile('brand_img')){
            $get_image = $request->file('brand_img');
            $image = Str::random(10).".".$get_image->getClientOriginalExtension();
            Image::make($get_image)->resize(80, 80)->save(public_path('/backend/img/Brand/'.$image));
            if(file_exists($icon_img)){
                unlink($icon_img);
             }
            Brand::findOrFail($id)->update([
                'brand_img'=>'backend/img/Brand/'.$image,
                'brand_name'=>$request->brand_name
            ]);
        }
        else{
            Brand::findOrFail($id)->update([
                'brand_name'=>$request->brand_name
            ]);
        }
        return redirect(route('brand.index'))->with('success','Brand Edited');
    }
    function destroy($id){
        $delete = Brand::findOrFail($id)->brand_img;
        if(file_exists($delete)){
            unlink($delete);
         }
        Brand::findOrFail($id)->delete();
        Product::where('brand_id',$id)->delete();
        return back()->with('delete','Brand Item Deleted');
    }

}
