<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\authapi;
use App\Http\Controllers\Api\socialite;
use App\Http\Controllers\Api\language;
use App\Http\Controllers\Api\profile;
use App\Http\Controllers\Api\question;
use App\Http\Controllers\Api\answer;
use App\Http\Controllers\Api\like;
use App\Http\Controllers\Api\ratingcontroller;
use App\Http\Controllers\Api\search;
use App\Http\Controllers\Api\notifications;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Route as RoutingRoute;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//socialite
Route::get('/login/{provider}', [socialite::class, 'redirectToProvider'])->middleware("web");
Route::get('/login/{provider}/callback', [socialite::class, 'handleProviderCallback'])->middleware("web");
//auth
Route::post('/login', [authapi::class, 'login']); //login
Route::post('/register', [authapi::class, 'register']);
Route::post('/logout', [authapi::class, 'logout']); //logout
Route::post('/user', [authapi::class, 'me']); //fache data user
Route::post('/refresh', [authapi::class, 'refresh']); //refresh token
//profile
Route::post('/updateprofile/{id}', [profile::class, 'updateprofile']); //updateProfile
Route::post('/addfollow/{id}', [profile::class, 'addfollow']); 
Route::get('/showfollow/{id}', [profile::class, 'showfollow']); 
Route::get('/profile/{id}', [profile::class, 'profile']); //get info user
//show languages
Route::get('/showlanguage', [language::class, 'show']); //show All languages
Route::post('/addlanguage', [language::class, 'add']); //show All languages

//Question
Route::resource('/qusetion', question::class);
Route::post('/rating',[ratingcontroller::class,'save']);
//Answer
Route::resource('/answer', answer::class);
//likes
Route::post('/like',[like::class,'store']);
Route::post('/show_like',[like::class,'index']);
Route::post('/unlike',[like::class,'destroy']);
//search
Route::get("/search",[search::class,'search']);
//notifications
Route::get('/showNotifications/{id}',[notifications::class,'show']);
Route::post('/readNotifications',[notifications::class,'read']);
Route::post('/quaNotifications',[notifications::class,'qua']);

