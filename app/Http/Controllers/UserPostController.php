<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $user)
    {   
        $posts = Post::get();
        $userPosts = [];
        foreach($posts as $post) {
            if($post->user_id === $user->id) {
                array_push($userPosts, $post);
            }   
        };

        return view("users.userposts",[
            "user" => $user,
            "posts" => $userPosts
        ]);
    }
}
