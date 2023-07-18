<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use App\Model\Backend\Subscription;
use App\Model\Backend\SubEmails;
use App\User;
use Illuminate\Support\Facades\Auth;
use Mail;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    function index(){

        $subs = Subscription::all();
        return view('Backend.subscription.subs',compact('subs'));
    }
    function create(){
        return view('Backend.subscription.subs_create');
    }
    function store(Request $request){
        Subscription::insert([
            'email'=>$request->email,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->route('subscription.index')->with('success','Successfully inserted');
    }

    function SendingEmail($id){
        return view('Backend.subscription.email_template',compact('id'));
    }
    function EmailSent($id,Request $request){
        $subs = Subscription::where('id',$id)->first();
        $email = $subs->email;
            SubEmails::where('id',$id)->insert([
                'subscription_id'=>$id,
                'heading'=>$request->heading,
                'subject'=>$request->subject,
                'email_description'=>$request->email_description,
            ]);
            $heading = $request->heading;
            $subject = $request->subject;
            $email_description = $request->email_description;

            $data = array(
                'heading'=>$request->heading,
                'subject'=>$request->subject,
                'email_description'=>$request->email_description,
                );

            Mail::send('Backend/subscription/emails',$data, function($message) use ($email,$heading,$subject,$email_description) {
                $message->to($email, $heading)->subject
                   ($subject);
                $message->from('dhhasansaha11@gmail.com','Alamin Fashion House');
             });
             return redirect()->route('subscription.index')->with('success','Successfully email sent');

    }

    function destroy($id){
      Subscription::where('id',$id)->delete();
      SubEmails::where('subscription_id',$id)->delete();
      return back()->with('success','Successfully Deleted');
    }

    function EmailSentAllSubscriber(){
        $subs = Subscription::all();
        $data = array(
            'heading'=>'Test Heading',
            'subject'=>'Test Subject',
            'email_description'=>'Test Description',
            );

        foreach($subs as $sub){
        Mail::send('Backend/subscription/emails',$data, function($message) use ($sub) {
            $message->to($sub->email, 'All user sent Message test(this might be heading')->subject
                ('This subject');
            $message->from('dhhasansaha11@gmail.com','Alamin Fashion House');
            });
        }
        return back()->with('success','Successfully message Sents to all user');


    }

    function users(){
        $users = User::all();
        return view('Backend.subscription.users',compact('users'));
    }
    function Admin(){
        $admins = Admin::all();
        return view('Backend.subscription.admins',compact('admins'));
    }


}
