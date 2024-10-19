<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
        ]);

        $inputs = array(
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        );
 
       Contact::create($inputs);
    
         Mail::send('pages.email',
           array(
               'name' => $request->name,
               'email' => $request->email,
               'user_message' => $request->message
           ), function($message)
           {
               $message->from('test@gmail.com');
               $message->to('develop@utsab.ca', '')->subject('Contact Information');
           });

          // Mail::to($mail_to)->send(new CompanyVerificationEmails);

       return back()->with('alert-success', 'Thanks for contacting us!');
    }
}
