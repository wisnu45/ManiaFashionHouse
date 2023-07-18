<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\FAQ;
class FaqController extends Controller
{
    function index(){
        $faqs = FAQ::all();
        return view('Backend.faq.faq',compact('faqs'));
    }
    function create(){
        return view('Backend.faq.faq_create');
    }
    function store(Request $request){
        FAQ::insert([
            'question_about'=>$request->question_about,
            'question'=>$request->question,
            'answer'=>$request->answer,
            'status'=>$request->status,
        ]);
        return redirect()->route('faq.index')->with('success','Successfully submited FAQ');
    }
    function edit($id){
        $faq = FAQ::where('id',$id)->first();
        return view('Backend.faq.faq_edit',compact('faq'));
    }
    function update($id,Request $request){
        FAQ::findOrFail($id)->update([
            'question_about'=>$request->question_about,
            'question'=>$request->question,
            'answer'=>$request->answer,
            'status'=>$request->status,
        ]);
        return redirect()->route('faq.index')->with('success','Successfully Edited FAQ');
    }

    function destroy($id){
        FAQ::findOrFail($id)->delete();
        return back()->with('success','Successfully Deleted FAQ');
    }
    function active($id){
        FAQ::where('id',$id)->update([
            'status'=>1,
            ]);
            return back()->with('success','Activated');
    }
    function deactive($id){
        FAQ::where('id',$id)->update([
            'status'=>0,
            ]);
            return back()->with('success','Deactivated');
    }
}
