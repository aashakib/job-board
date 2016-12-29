<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => 'web'], function () {

    Route::get('/', ['as' => 'homepage', "uses" => 'HomeController@index']);
//    Route::get('login', ['as' => 'user.login', "uses" => 'Auth\LoginController@showLoginForm']);
//    Route::post('login', ['as' => 'user.login', "uses" => 'Auth\LoginController@showLoginForm']);
//    Route::get('register', ['as' => 'user.register', "uses" => 'Auth\RegisterController@showRegistrationForm']);

});

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('dashboard', 'DashboardController@index');

    Route::get('job/add', ['as' => 'job.create', "uses" => 'DashboardController@addJob']);
    Route::post('job/save', ['as' => 'job.save', "uses" => 'DashboardController@saveJob']);
    Route::get('jobs', ['as' => 'job.list', "uses" => 'DashboardController@jobLists']);

});


