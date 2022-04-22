<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class FeedbackController extends Controller
{
    public function showFeedbackForm()
    {
        return view('feedback');
    }

    public function sendQuestion(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        Mail::send('emails/email_feedback', [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'comment' => $request->get('comment') ],
            function ($message) {
                $message->from('bf3310@ya.ru');
                $message->to('bf3310@ya.ru', 'Admin')
                    ->subject('Feedback Hotels');
            });
        return back()->with('success', 'Thanks for contacting us! We will get back to you soon!');

    }
}

