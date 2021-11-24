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
    Route::get('index/{id?}', 'PostController@index')->name('all-posts');
    Route::post('create', 'PostController@store')->name('create-post');
    Route::patch('update/{id}', 'PostController@update')->name('update-post');
    Route::delete('delete/{id}', 'PostController@delete')->name('delete-post');

    //routes for comments
    Route::get('/comments/{id?}', 'CommentController@index')->name('get-all-comments');
    Route::post('/comment/create', 'CommentController@store')->name('store-comment');
    Route::patch('/comment/update/{id}', 'CommentController@update')->name('update-comment');
    Route::delete('/comment/delete/{id}', 'CommentController@delete')->name('delete-comment');

    //other utilities
    Route::get('with-comments/{id}', 'UtilityController@postComments')->name('post-comments');
});
