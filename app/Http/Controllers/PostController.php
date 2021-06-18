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
        switch($posts) {
            case $posts->count() <= 10:
                $posts = Post::with(["user", "likes"])->orderby("created_at", "desc")->paginate(5);
                break;
            case $posts->count() <= 20:
                $posts = Post::with(["user", "likes"])->orderby("created_at", "desc")->paginate(10);
                break;
            case $posts->count() <= 40:
                $posts = Post::with(["user", "likes"])->orderby("created_at", "desc")->paginate(20);
                break;        
            default:                       
                $posts = Post::with(["user", "likes"])->orderby("created_at", "desc")->paginate(25);
        }


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
