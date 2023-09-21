<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function store(Request $request){

        request()->validate([
            'email'=> ['required']
        ]);

        $mailData = [
            'body'=> 'You are now subscribed to our news letter'
        ];

        Mail::to('antonatic345@gmail.com')->send(new NewsletterMail($mailData));

        return back();
    }
}
