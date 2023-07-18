<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\About;

class AboutController extends Controller
{
    function index(){
        $abouts = About::all();
        return view('backend.about.about',compact('abouts'));
    }

    function create(){
        return view('backend.about.about_create');
    }
    function store(Request $request){
        About::insert([
            'about_title'=>$request->about_title,
            'short_notes'=>$request->short_notes,
            'quotes'=>$request->quotes,
            'author_name'=>$request->author_name,
            'our_story'=>$request->our_story,
        ]);
        return redirect()->route('about.index')->with('success','Successfully Inserted');
    }


    function update($id,Request $request){
        About::findOrFail($id)->update([
            'about_title'=>$request->about_title,
            'short_notes'=>$request->short_notes,
            'quotes'=>$request->quotes,
            'author_name'=>$request->author_name,
            'our_story'=>$request->our_story,
        ]);
        return redirect()->route('about.index')->with('success','Successfully Edited');
    }
    function destroy($id){
        About::findOrFail($id)->delete();
        return back()->with('delete','Successfully deleted');
    }
}
