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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return 'Welcome to the largest car troubleshooting community, Jeremy Clarkson aprooved!';
});

Route::get('posts', 'PostController@index');

Route::get('posts/{id}', 'PostController@show')->name('posts.show');
