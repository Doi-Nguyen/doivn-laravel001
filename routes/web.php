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
    return view('welcome');
});

//Route::get('/test', 'testController@index');
Auth::routes();

Route::group(['prefix' => 'admin','middleware'=>'admin'], function () {
    Route::get('home', 'Admin\HomeController@index');
    Route::get('user', 'Admin\UserController@index');
});

Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('info', 'HomeController@infoUser');
    Route::post('info', 'HomeController@updateUser');
});
