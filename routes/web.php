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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login');
});
Route::post('/login','App\Http\Controllers\UserController@login');
Route::get('/signup', function () {
    return view('signup');
});
Route::post('/signup','App\Http\Controllers\UserController@signup');
Route::get('/logout', function () {
    Session::forget('user');                                    //To erase session 'user' from the browser
    return redirect('/');
});

Route::get('home','App\Http\Controllers\PhonebookController@index');
Route::get('create','App\Http\Controllers\PhonebookController@create');
Route::post('store','App\Http\Controllers\PhonebookController@store');
Route::get('edit/{id}','App\Http\Controllers\PhonebookController@edit');
Route::put('update/{id}','App\Http\Controllers\PhonebookController@update');
Route::put('update/{id}','App\Http\Controllers\PhonebookController@update');
Route::get('delete/{id}','App\Http\Controllers\PhonebookController@destroy');