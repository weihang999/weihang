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

Auth::routes(['verify' => true]);

//route to access login page
Route::get('/login','loginController@showLogin');

//route to process login form
Route::post('/login','loginController@doLogin');

//wild card can put any name
//show user profile
Route::get('/user/{user}','loginController@doUser');

//logout user
Route::get('/logout','loginController@logout');

//show the page of editing user profile
Route ::get('/user/{user}/edit','loginController@edit');

//update the user profile
Route::patch('/user/{user}','loginController@update');

//sign up for users
Route::get('/register','registerController@index');

//process register date_create_from_format
Route::post ('/register','registerController@store');
