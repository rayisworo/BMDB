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

//movies
Route::get('/movie','MovieController@manage')->name('manageMovies');
Route::get('/movie/add','MovieController@create')->name('addMovie');
Route::post('/movie/store','MovieController@store')->name('storeMovie');
Route::get('/movie/edit/{id}','MovieController@edit')->name('editMovie');
Route::post('/movie/update/{id}','MovieController@update')->name('updateMovie');
Route::get('/movie/delete/{id}','MovieController@destroy')->name('deleteMovie');
Route::get('/movie/{id}','MovieController@view')->name('viewMovie');

//comment
Route::post('/comment/{id}','CommentController@store')->name('storeComment');
Route::get('/comment/{id}/delete','CommentController@destroy')->name('deleteComment');
