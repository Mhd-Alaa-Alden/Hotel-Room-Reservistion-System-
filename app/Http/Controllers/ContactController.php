<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Send email
        $data = [
            'nzame' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'messages' => $request->message,
        ];

        Mail::send('emails.contact', $data, function ($message) {
            $message->to('nakawaabdalrahman@gmail.com')->subject('New message from your website');
        });

        // Optionally, you can redirect the user after successful submission
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
