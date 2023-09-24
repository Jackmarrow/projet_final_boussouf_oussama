<?php

namespace App\Http\Controllers;

use App\Models\AdminInfo;
use App\Models\MailBox;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $adminInfo = AdminInfo::first();
        return view('frontend.pages.contact', compact('adminInfo'));
    }

    public function store(Request $request){
        request()->validate([
            'sent_by'=> ['required'],
            'subject'=> ['required'],
            'email'=> ['required'],
            'message'=> ['required'],
        ]);

        MailBox::create([
            'sent_by'=> $request->sent_by,
            'subject'=> $request->subject,
            'email'=> $request->email,
            'message'=> $request->message
        ]);

        return back();
    }
}
