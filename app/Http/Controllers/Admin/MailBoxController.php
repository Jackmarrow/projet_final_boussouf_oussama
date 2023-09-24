<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MailBox;
use Illuminate\Http\Request;

class MailBoxController extends Controller
{
    public function index(){
        $mails = MailBox::all();
        return view('admin.pages.mail-box',compact('mails'));
    }
}
