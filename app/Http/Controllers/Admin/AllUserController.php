<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AllUserController extends Controller
{
    public function index(){
        $users = User::all();
        $roles = Role::whereNotIn("name", ['admin'])->get();
        return view('admin.pages.all-user', compact('users', 'roles'));
    }

    public function changeRole(User $user)
    {
        if ($user->hasRole("webmaster")) {

            $user->removeRole("webmaster");
            $user->assignRole("user");
            
        } else {
            $user->removeRole("user");
            $user->assignRole("webmaster");
        }
        return redirect()->back();
    }

    public function destroy(User $user){
        $user->delete();
        return back();
    }
}
