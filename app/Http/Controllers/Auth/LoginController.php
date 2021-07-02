<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(["guest"]);
    }

    public function index(Request $request) 
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {   
        //Validate Request
        $this->validate($request, [
            'username' => ["required"],
            'password' => ["required"]
        ]);

        //Handles Response
        if(!auth()->attempt($request->only("username", "password"), $request->remember)) {
            return back()->with("status", "Invalid login details");
        }
        
        return redirect()->route("dashboard");
    }
}
