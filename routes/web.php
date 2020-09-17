<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Temporary
Route::get('/email', function() {
    return new \App\Mail\NewUserWelcomeMail();
});

// Profile
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

// Post
Route::get('/',                 'PostController@index')->name('index');
Route::get('/post',             'PostController@index')->name('post.index');     // Not done yet
Route::get('/post/create',      'PostController@create')->name('post.create');
Route::post('/post',            'PostController@store')->name('post.store');
Route::get('/post/{post}',      'PostController@show')->name('post.show');
Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');       // Not done yet
Route::put('/post/{post}',      'PostController@update')->name('post.update');   // Not done yet
Route::delete('/post/{post}',   'PostController@destroy')->name('post.destroy'); // Not done yet

// Follow Button
Route::post('/follow/{user}', 'FollowController@store')->name('follow.store');
