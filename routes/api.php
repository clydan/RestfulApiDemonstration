<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('post')->group(function(){
    Route::get('/index', 'PostController@index')->name('all-posts');
    Route::get('/index/{id}', 'PostController@view')->name('single-posts');
    Route::post('/create', 'PostController@store')->name('create-post');
    Route::patch('/update/{id}', 'PostController@update')->name('update-post');
    Route::delete('/delete/{id}', 'PostController@delete')->name('delete-post');

    //user's posts
    Route::get('/user/{id}', 'PostController@getUserPost')->name('user-posts');

    //routes for comments
    Route::get('/comments/{id?}', 'CommentController@index')->name('get-all-comments');
    Route::post('/comment/create', 'CommentController@store')->name('store-comment');
    Route::patch('/comment/update/{id}', 'CommentController@update')->name('update-comment');
    Route::delete('/comment/delete/{id}', 'CommentController@delete')->name('delete-comment');

    //Announcements or Ads routes
    Route::get('/ad/{ad}', 'AdController@view')->name('ad-view');
    Route::get('/ad', 'AdController@index')->name('ad-index');

    //other utilities
    Route::get('with-comments/{id}', 'UtilityController@postComments')->name('post-comments');
    Route::get('with-user/{id}', 'UtilityController@userPosts')->name('post-user');

    //user related routes
    // Route::prefix('user')->group(function(){
    //     Route::get('/posts/{id}', 'PostController@getUserPost')->name('user-posts');
    // });
});
