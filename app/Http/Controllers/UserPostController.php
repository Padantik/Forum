<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $user)
    {   
        app("App\Http\Controllers\Sidebar\SidebarUserController")->index();

        $request = Auth::user(); 

        $posts = Post::orderby("created_at", "desc")->get();
        $userPosts = [];
        //Get Posts
        foreach($posts as $post) {
            if($post->user_id === $user->id) {
                array_push($userPosts, $post);
            }   
        };

        $users = User::get();     

        return view("users.userposts",[
            "user" => $user,
            "posts" => $userPosts,
            "allUsers" => $users,
            "request" => $request
        ]);
    }
}
