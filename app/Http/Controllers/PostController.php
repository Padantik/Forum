<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {   
        $posts = Post::get();
        

        return view("posts.posts", [
            "posts" => $posts
        ]);
    }

    public function store(Request $request)
    {       
        $this->validate($request, [
            "body" => "required"
        ]);

        $request->user()->posts()->create([
            'body'=> $request->body
        ]);

        return back();
    }

    public function destroy(Post $post, Request $request)
    {   
        $post->delete();
        return back();
    }
}
