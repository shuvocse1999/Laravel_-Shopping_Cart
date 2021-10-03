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
    return view('cart');
});


Route::post('/add_to_cart/{id}','CartController@add_to_cart');
Route::get('/getdata','CartController@getdata');
Route::get('/getsummary','CartController@getsummary');
Route::get('/deletecarts/{id}','CartController@deletecarts');

Route::post('/cartincrement/{id}','CartController@cartincrement');



