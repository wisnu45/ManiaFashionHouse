<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Blog;
use App\Model\Backend\Comment;
use Image;
use Str;
use Auth;
use Carbon\Carbon;

class BlogController extends Controller
{
    function index(){
        $blogs = Blog::all();
        $comments = Comment::all();
        return view('backend/blog/blog',compact('blogs','comments'));
    }
    function create(){
        return view('backend/blog/blog_create');
    }

    function store(Request $request){

        if( $request->hasFile('features_img')){
            $get_image = $request->file('features_img'); //orginal image;
                $image = Str::random(5).".".$get_image->getClientOriginalExtension();
                Image::make($get_image)->save(public_path('/backend/img/blog/'.$image));
                Blog::insert([
                    'features_img'=>'backend/img/blog/'.$image,
                    'author_name'=>$request->author_name,
                    'tag'=>$request->tag,
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'meta_title'=>$request->meta_title,
                    'slug'=>$request->slug,
                    'meta_description'=>$request->meta_description,
                ]);

            }

        return redirect(route('blog.index'))->with('success','Successfully Blog Added');
    }
    function edit($id){
        $blog = Blog::where('id',$id)->first();
        return view('backend/blog/blog_edit',compact('blog'));
    }
    function update($id, Request $request){
        if($request->hasFile('features_img')){
            $get_image = $request->file('features_img'); //orginal image;
            $image = Str::random(5).".".$get_image->getClientOriginalExtension();
            Image::make($get_image)->save(public_path('/backend/img/blog/'.$image));

            $product =Blog::where('id',$id)->first();
            $productImage =$product->features_img;

            if(file_exists($productImage)){
                    unlink($productImage);
                }

            Blog::findOrFail($id)->update([
                'features_img'=>'backend/img/blog/'.$image,
                    'author_name'=>$request->author_name,
                    'tag'=>$request->tag,
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'meta_title'=>$request->meta_title,
                    'slug'=>$request->slug,
                    'meta_description'=>$request->meta_description,
            ]);
        }
        else{
            Blog::findOrFail($id)->update([
                'author_name'=>$request->author_name,
                'tag'=>$request->tag,
                'title'=>$request->title,
                'description'=>$request->description,
                'meta_title'=>$request->meta_title,
                'slug'=>$request->slug,
                'meta_description'=>$request->meta_description,
                ]);
        }
        return redirect(route('blog.index'))->with('success','Successfully Blog Updated');
    }
    function destroy($id){
        $blog =Blog::where('id',$id)->first();
        $blog_img =$blog->features_img;
        if(file_exists($blog_img)){
                unlink($blog_img);
            }
        Blog::findOrFail($id)->delete();
        return back()->with('delete','Blog Deleted successfully');
    }

    // Comments
    function StoreComment($id,Request $request){

            Comment::insert([
                'blog_id'=>$id,
                'author_id'=>Auth::id(),
                'fname'=>$request->fname,
                'email'=>$request->email,
                'comment'=>$request->comment,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('success','Successfully commented');
    }













}
