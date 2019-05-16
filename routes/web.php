<?php

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
    return view('/welcome');
});




Route::get('/home', 'HomeController@index')->name('home');
Route::post('/add', 'HomeController@add');
Route::get('/show', 'HomeController@show');
Route::get('/show_rslt', 'HomeController@show_rslt');
Route::post('/add2', 'HomeController@add2');
Auth::routes();