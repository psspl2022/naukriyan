<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsThanksMail;
use Illuminate\Http\Request;
use App\ContactUs;
use Mail;
use App\Mail\ContactUsMail;

class ContactUsController extends Controller
{
    public function index()
    {
        return ContactUs::where('status', 'active')->get();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $contact = new ContactUs();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact_no = $request->contact_no;
        $contact->remarks = $request->remarks;
        $contact->save();
        //send mail
        $to = 'contactus@naukriyan.com';
        $mobile = $request->contact_no;
        $name = $request->name;
        $email = $request->email;
        $remarks = $request->remarks;
        Mail::to($to)->send(new ContactUsMail($name, $mobile, $remarks, $email));
        Mail::to($email)->send(new ContactUsThanksMail($name));

    }
}
