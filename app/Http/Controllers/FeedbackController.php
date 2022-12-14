<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
    public function feedback(request $req){
        return view('public.feedback');
    }
    public function postFeedback(request $req){
        $req->validate([
            'email' => 'required|unique:feedbacks',
        ], 
          [
            'email.unique' => 'Your feedback already exist!',
          ]
        );

        $self = new Feedback();
        $self->name = $req->name;
        $self->email = $req->email;
        $self->contact = $req->contact;
        $self->remarks = $req->remark;
        $self->rating = $req->rating;
        $self->save();
 
        // $self_data = [
        //  'name' => $req->name,
        //  'id' => $self->id
        // ];  
 
        // $toEmail = 'ankit.bisht@prakharsoftwares.com';
        // Mail::send('SendMail.Online-Registration.registration', $self_data, function ($message) use ($toEmail) {
        //  $message->from(env('MAIL_USERNAME'));
        //  $message->to($toEmail)->subject('Online Candidate Registration');
        //  });
 
        return redirect()->back()->with('alert_success','For your valuable feedback!');
    }

    public function feedbackList(){
        $feedback_data = Feedback::orderByDesc("id")->get(); 
        return response()->json(['data' => $feedback_data], 200);
    }
}
