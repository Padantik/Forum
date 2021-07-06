<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(User $user, Request $request)
    {
        $users = User::get();
        $userResults = [];
        foreach($users as $user) {
            if($request->user()->id != $user->id) {
                array_push($userResults, $user);
            }
        };


        $data = json_decode(Http::get("https://newsapi.org/v2/top-headlines?country=GB&apiKey=e61c8b190651435086563c2d1bf5e34e")->body())->articles;
        $result = [];
        foreach($data as $article) {
            if($article->urlToImage != null) {
                array_push($result, $article);
            };
        };
        
        return view("posts/dashboard", [
            "articles" => $result,
            "users" => $userResults
        ]);
    }
}
