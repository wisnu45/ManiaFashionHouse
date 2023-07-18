<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Contact;
use App\Model\Backend\Contact_message;
use Carbon\Carbon;
use App\Notifications\ThankingForMsz;
use Auth;
class ContactController extends Controller
{
    function index(){
        $message = Contact_message::all();
        $contacts = Contact::all();
        return view('backend.contact.contact',compact('contacts','message'));
    }
    function create(){
        return view('Backend.contact.contact_create');
    }
    function store(Request $request){
        Contact::insert([
            'phone'=>$request->phone,
            'street'=>$request->street,
            'distric'=>$request->distric,
            'address'=>$request->address,
            'days'=>$request->days,
            'hours'=>$request->hours,

        ]);
        return redirect()->route('contact.index')->with('success','Successfully added contact');

    }
  
    function update($id,Request $request){
        Contact::findOrFail($id)->update([
            'phone'=>$request->phone,
            'street'=>$request->street,
            'distric'=>$request->distric,
            'address'=>$request->address,
            'days'=>$request->days,
            'hours'=>$request->hours,
        ]);
        return redirect()->route('contact.index')->with('success','Successfully Edited contact');
    }
    function destroy($id){
        Contact::findOrFail($id)->delete();
        return back()->with('delete','Successfully Deleted contact');
    }
    function PostMessage(Request $request){
        Contact_message::insert([
            'fname'=>$request->fname,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);
        $user = Auth::user();
        $user->notify(new ThankingForMsz);
        return back()->with('success','Successfully submited Message');
    }
}
