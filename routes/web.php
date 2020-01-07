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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'MovieController@index')->name('home');

//profiles
Route::get('/profile','ProfileController@index')->name('profile');
Route::get('/profile/edit/{id}','ProfileController@edit')->name('profileEdit');
Route::post('/profile/update/{id}','ProfileController@update')->name('profileUpdate');
