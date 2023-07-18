<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Brand;
use App\Model\Backend\Catagory;
use App\Model\Backend\ColorSize;
use App\Model\Backend\Product;
use App\Model\Backend\Subcatagory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    function index(){
        $catagories = Catagory::all();
        return view('Frontend.shop',compact('catagories'));
    }
    function Store_products(){
        $products = Product::latest()->get();
        $varients = ColorSize::all();
        $subcats = Subcatagory::all();
        $collections = Catagory::all();
        $brands = Brand::all();

        return view('Frontend.store_products',compact('products','varients','subcats','collections','brands'));
    }
    function Shop_collection($id){
        $products = Product::where('catagory_id',$id)->latest()->get();
        $varients = ColorSize::all();
        $subcats = Subcatagory::all();
        $collections = Catagory::all();
        $brands = Brand::all();
        return view('Frontend.store_products',compact('products','varients','subcats','collections','brands'));

    }
    function Shop_subcollection($id){
        $products = Product::where('subcatagory_id',$id)->latest()->get();
        $varients = ColorSize::all();
        $subcats = Subcatagory::all();
        $collections = Catagory::all();
        $brands = Brand::all();
        return view('Frontend.store_products',compact('products','varients','subcats','collections','brands'));
    }
    function Shop_color($id){
        $products = Product::where('id',$id)->latest()->get();
        $varients = ColorSize::all();
        $subcats = Subcatagory::all();
        $collections = Catagory::all();
        $brands = Brand::all();
        return view('Frontend.store_products',compact('products','varients','subcats','collections','brands'));
    }
    function Shop_Brand($id){
        $products = Product::where('brand_id',$id)->latest()->get();
        $varients = ColorSize::all();
        $subcats = Subcatagory::all();
        $collections = Catagory::all();
        $brands = Brand::all();
        return view('Frontend.store_products',compact('products','varients','subcats','collections','brands'));
    }
}
