<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PostController@home');

//////////////////////// COTER FRONT : ////////////////////////
Route::get('posts', 'PostController@index');
Route::get('post/{slug?}', 'PostController@show');
Route::get('contact', 'PostController@showContact');
Route::post('contact', 'PostController@sendContact');

// les commentaires :
Route::resource('/comment', 'CommentController');

// les categories :
Route::get('/categorie/{id}', 'PostController@showPostByCategory');


//////////////////////// COTER BACK : ////////////////////////
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index');         // page d'accueil apres la connection
    Route::resource('/posts', 'Admin\PostAdminController');     // page posts
});


//////////////////////////// GESTION D'AUTH : ////////////////////////////
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


//////////////////////////// MAIL DEV : ////////////////////////////
Route::get('mail', function() {
    Mail::send('emails.email', ['name' => 'Pierre'], function($message) {
        $message->from('hicode@hicode.fr', 'Laravel');
        $message->to('pierremartin.pro@gmail.com')->cc('bar@exemple.com');
    });
});

