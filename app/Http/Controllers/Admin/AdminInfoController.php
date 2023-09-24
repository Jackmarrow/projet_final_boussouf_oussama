<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminInfo;
use Illuminate\Http\Request;

class AdminInfoController extends Controller
{
    public function index(){
        $info = AdminInfo::first();
        return view('admin.pages.admin-info', compact('info'));
    }

    public function update(Request $request, AdminInfo $info){
        request()->validate([
            'city'=> ['required'],
            'address'=> ['required'],
            'phone_number'=> ['required'],
            'email'=> ['required'],
        ]);

        $info->update([
            'city'=> $request->city,
            'address'=> $request->address,
            'phone_number'=> $request->phone_number,
            'email'=> $request->email,
        ]);

        return back();
    }
}
