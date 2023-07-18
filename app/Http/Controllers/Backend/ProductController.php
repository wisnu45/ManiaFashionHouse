<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Brand;
use App\Model\Backend\Catagory;
use App\Model\Backend\ColorSize;
use App\Model\Backend\Product;
use App\Model\Backend\Subcatagory;
use Illuminate\Http\Request;
use Image;
use Str;
use Carbon;
class ProductController extends Controller
{
    function index(){
        $colors = ColorSize::all();
        $products = Product::all();
        return view('Backend/product_management/product/products',compact('products','colors'));
    }

    function create(){

        $subcatagories = Subcatagory::all();
        $catagories = Catagory::all();
        $brands = Brand::all();
        return view('Backend.product_management.product.product_create',compact('subcatagories','catagories','brands'));
    }
    function store(Request $request){
        $request->validate([
            'product_img'=>['required'],
            'catagory_id'=>['required'],
            'subcatagory_id'=>['required'],
            'brand_id'=>['required'],
            'status'=>['required'],
            'sku_id'=>['required','integer'],
            'product_name'=>['required'],
            'price'=>['required','integer'],
            'short_description'=>['required'],
            'product_type'=>['required'],
            'long_description'=>['required'],
            'material'=>['required'],
            ]);


        // product

        if( $request->hasFile('product_img')){
            $get_image = $request->file('product_img'); //orginal image;
            $imgArry = [];

            foreach($get_image as $images){
                    $image = Str::random(5).".".$images->getClientOriginalExtension();
                    Image::make($images)->save(public_path('/backend/img/products/'.$image));
                    array_push($imgArry,"backend/img/products/".$image);
                }
                Product::insert([
                    'product_img'=>json_encode($imgArry),
                    'catagory_id'=>$request->catagory_id,
                    'subcatagory_id'=>$request->subcatagory_id,
                    'brand_id'=>$request->brand_id,
                    'sku_id'=>$request->sku_id,
                    'product_name'=>$request->product_name,
                    'price'=>$request->price,
                    'short_description'=>$request->short_description,
                    'product_type'=>$request->product_type,
                    'long_description'=>$request->long_description,
                    'material'=>$request->material,
                    'is_features'=>$request->is_features,
                    'best_selling'=>$request->is_features,
                    'status'=>$request->status,
                    'meta_title'=>$request->meta_title,
                    'slug'=>$request->slug,
                    'meta_description'=>$request->meta_description,
                ]);

            }

        return redirect(route('product.index'))->with('success','Successfully product Added');

    }
    function active($id){
        Product::where('id',$id)->update([
            'status'=>1,
            ]);
            return back()->with('success','Activated');
    }
    function deactive($id){
        Product::where('id',$id)->update([
            'status'=>0,
            ]);
            return back()->with('success','Deactivated');
    }

    function edit($id){
        $brands = Brand::all();
        $subcatagories = Subcatagory::all();
        $catagories = Catagory::all();
        $product = Product::where('id',$id)->first();
        return view('Backend/product_management/product/product_edit',compact('subcatagories','catagories','product','brands'));
    }
    function update(Request $request,$id){
        $product =Product::where('id',$id)->first();
        $productImage =$product->product_img;


        if($request->hasFile('product_img')){
            $get_image = $request->file('product_img');
            $imgArry = [];
            foreach($get_image as $images){
                $image = Str::random(5).".".$images->getClientOriginalExtension();
                    Image::make($images)->save(public_path('/backend/img/products/'.$image));
                    array_push($imgArry,"backend/img/products/".$image);
            }
            foreach($productImage as $img){
                if(file_exists($img)){
                        unlink($img);
                    }
                }
            $product =Product::where('id',$id)->first();
            $productImage =$product->product_img;
            foreach($productImage as $img){
            if(file_exists($img)){
                    unlink($img);
                }
            }
            Product::findOrFail($id)->update([
                'product_img'=>$imgArry,
                'catagory_id'=>$request->catagory_id,
                'subcatagory_id'=>$request->subcatagory_id,
                'brand_id'=>$request->brand_id,
                'sku_id'=>$request->sku_id,
                'product_name'=>$request->product_name,
                'price'=>$request->price,
                'short_description'=>$request->short_description,
                'product_type'=>$request->product_type,
                'long_description'=>$request->long_description,
                'material'=>$request->material,
                'is_features'=>$request->is_features,
                'best_selling'=>$request->is_features,
                'status'=>$request->status,
                'meta_title'=>$request->meta_title,
                'slug'=>$request->slug,
                'meta_description'=>$request->meta_description,
            ]);
        }
        else{
            Product::findOrFail($id)->update([
                'catagory_id'=>$request->catagory_id,
                'subcatagory_id'=>$request->subcatagory_id,
                'brand_id'=>$request->brand_id,
                'sku_id'=>$request->sku_id,
                'product_name'=>$request->product_name,
                'price'=>$request->price,
                'short_description'=>$request->short_description,
                'product_type'=>$request->product_type,
                'long_description'=>$request->long_description,
                'material'=>$request->material,
                'is_features'=>$request->is_features,
                'best_selling'=>$request->is_features,
                'status'=>$request->status,
                'meta_title'=>$request->meta_title,
                'slug'=>$request->slug,
                'meta_description'=>$request->meta_description,
                ]);
        }

        return redirect(route('product.index'))->with('success','Product Updated successfully');
    }

    function destroy($id){
        $product =Product::where('id',$id)->first();
        $productImage =$product->product_img;
        foreach($productImage as $img){
        if(file_exists($img)){
                unlink($img);
            }
        }
        Product::findOrFail($id)->delete();
        ColorSize::where('product_id',$id)->delete();
        return back()->with('delete','Product Deleted successfully');
    }
    function subcatagoryAzax($id){
        $subcat = Subcatagory::where('catagory_id',$id)->get();
        return response()->json($subcat);
    }
    function featured(){
        $colors = ColorSize::all();
        $products = Product::where('is_features','on')->get();

        return view('Backend.product_management.product.featured_product',compact('products','colors'));
    }
    function feature_delete($id){
        Product::findOrFail($id)->update([
            'is_features'=>false,
        ]);
        return back();
    }
    function bestSelling(){
        $colors = ColorSize::all();
        $products = Product::where('best_selling','on')->get();

        return view('Backend.product_management.product.best_selling',compact('products','colors'));
    }
    function bestSelling_delete($id){
        Product::findOrFail($id)->update([
            'best_selling'=>false,
        ]);
        return back();

    }

}
