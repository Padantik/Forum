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

//Home Page
Route::get("/", function() {
    return view("posts/index");
})->name("home");

//Post page
Route::get('/posts', [PostController::class, "index"])->name("posts");
Route::post("/posts", [PostController::class, "store"]);

//Dashboard Page
Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");

//Register Page
Route::get("/register", [RegisterController::class, "index"])->name("register");
Route::post("/register", [RegisterController::class, "store"]);

//Login
Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "store"]);

//Logout
Route::post("/logout", [LogoutController::class, "store"])->name("logout");


//Likes
Route::post("/posts/{post}/likes", [PostLikeController::class, "store"])->name("posts.likes");
Route::delete("/posts/{post}/likes", [PostLikeController::class, "destroy"]);

//Dislikes
Route::post("/posts/{post}/dislikes", [PostDislikeController::class, "store"])->name("posts.dislikes");
Route::delete("/posts/{post}/dislikes", [PostDisLikeController::class, "destroy"])->name("posts.dislikes.remove");
