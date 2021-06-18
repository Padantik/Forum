<?php

use Illuminate\Support\Facades\Route;
//Imports Controllers
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
//Authentication Controllers
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

//Likes
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostDislikeController;

//User
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserAccountController;



//Post page
Route::get('/posts', [PostController::class, "index"])->name("posts");
Route::post("/posts", [PostController::class, "store"]);
Route::delete("/posts/{post}", [PostController::class, "destroy"])->name("posts.destroy");

//Dashboard Page
Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");

//Register Page
Route::get("/register", [RegisterController::class, "index"])->name("register");
Route::post("/register", [RegisterController::class, "store"]);

//Login
Route::get("/", [LoginController::class, "index"])->name("login");
Route::post("/", [LoginController::class, "store"]);

//Logout
Route::post("/logout", [LogoutController::class, "store"])->name("logout");


//Likes
Route::post("/posts/{post}/likes", [PostLikeController::class, "store"])->name("posts.likes");
Route::delete("/posts/{post}/likes", [PostLikeController::class, "destroy"]);

//Dislikes
Route::post("/posts/{post}/dislikes", [PostDislikeController::class, "store"])->name("posts.dislikes");
Route::delete("/posts/{post}/dislikes", [PostDisLikeController::class, "destroy"])->name("posts.dislikes.remove");


//User Posts
Route::get("/users/{user}/posts", [UserPostController::class, "index"])->name("user.posts");


//Account Page
Route::get("/users/{user}", [UserAccountController::class, "index"])->name("user.account");