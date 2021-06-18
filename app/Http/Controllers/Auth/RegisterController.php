<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(["guest"]);
    }

    public function index() 
    {
        return view("auth/register");
    }
    public function store(Request $request) 
    {

        if($request->get("gender") != "Male")

        //Validate Request
        $this->validate($request, [
            'name' => ["required","max:255"],
            'username' => ["required","max:255"],
            'email' => ["required", "email", "max:255"],
            'password' => ["required","confirmed"],
            'birthday' => ["required","confirmed"],
            'gender' => ["required","confirmed"]
        ]);

        //Store User
        User::create([
            'name'=> $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            "email_verification" => false
        ]);
        
        //Sign user in
        auth()->attempt($request->only("email", "password"));

        //Redirect
        return redirect()->route("dashboard");
    }
}
