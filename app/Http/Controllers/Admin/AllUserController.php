<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AllUserController extends Controller
{
    public function index(){
        $allUsers = User::all();
        // All users who hasn't role admin
        $users = [];
        // Loop through all users and check if they are not admin
        foreach ($allUsers as $user) {
            if($user->hasRole(['webmaster','user'])){
                $users[] = $user;
            }
        }
        return view('admin.pages.all-user', compact('users'));
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
