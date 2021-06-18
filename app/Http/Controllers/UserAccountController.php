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

    public function index(User $user)
    {   
        if(auth()->user()->id != $user->id) {
            return back();
        }
        

        return view("users.useraccount", [
            "user" => $user,
        ]);
    }
}
