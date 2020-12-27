<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('posts.index');
});

Route::get('/home', function () {
    return 'Welcome to the largest car troubleshooting community, Jeremy Clarkson aprooved!';
});

// POSTS
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/create', 'PostController@create')->name('posts.create')->middleware('auth');
Route::post('posts', 'PostController@store')->name('posts.store');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');
Route::delete('posts/{post}', 'PostController@destroy')->name('posts.destroy');
Route::get('posts/{post}/edit', 'PostController@edit')->name('posts.edit')->middleware('auth');
Route::put('posts/{post}/store', 'PostController@update')->name('posts.update')->middleware('auth');


// USERS
Route::get('users', 'UserController@index')->name('users.index');
Route::get('users/create', 'UserController@create')->name('users.create');
Route::post('users', 'UserController@store')->name('users.store');
Route::get('users/{id}', 'UserController@show')->name('users.show');
Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');

// COMMENTS
Route::post('comments', 'CommentController@store')->name('comments.add')->middleware('auth');
Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
