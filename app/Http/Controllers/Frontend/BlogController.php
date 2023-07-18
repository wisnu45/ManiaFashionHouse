<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Backend\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(){
        $blogs =Blog::all();
        return view('Frontend.Blog_page',compact('blogs'));
    }
}
