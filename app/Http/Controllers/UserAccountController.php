<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;


class UserAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $user, Request $request)
    {   

        if(auth()->user()->id != $user->id) {
            return view("posts.dashboard");
        }
              
        $users = User::get();
        $userResults = [];
        foreach($users as $user) {
            if($request->user()->id != $user->id) {
                array_push($userResults, $user);
            }
        };

        return view("users.useraccount", [
            "user" => $user,
            "users" => $userResults
        ]);
    }
}
