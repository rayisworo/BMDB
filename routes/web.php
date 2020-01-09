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
Route::get('/users','ProfileController@manageUsers')->name('manageUsers');
Route::get('/users/add','ProfileController@create')->name('addUser');
Route::post('/users/store','ProfileController@store')->name('storeUser');
Route::get('/users/edit/{id}','ProfileController@editUser')->name('editUser');
Route::post('/users/update/{id}','ProfileController@updateUser')->name('updateUser');
Route::get('/users/delete/{id}','ProfileController@destroy')->name('deleteUser');

//movies
Route::get('/movie','MovieController@manage')->name('manageMovies');
Route::get('/movie/add','MovieController@create')->name('addMovie');
Route::post('/movie/store','MovieController@store')->name('storeMovie');
Route::get('/movie/edit/{id}','MovieController@edit')->name('editMovie');
Route::post('/movie/update/{id}','MovieController@update')->name('updateMovie');
Route::get('/movie/delete/{id}','MovieController@destroy')->name('deleteMovie');
Route::get('/movie/{id}','MovieController@view')->name('viewMovie');
Route::get('/movie/{id}/save','MovieController@saveMovie')->name('saveMovie');

//comment
Route::post('/comment/{id}','CommentController@store')->name('storeComment');
Route::get('/comment/{id}/delete','CommentController@destroy')->name('deleteComment');

//genre
Route::get('/genre', 'GenreController@index')->name('manageGenres');
Route::get('/genre/add', 'GenreController@create')->name('addGenre'); 
Route::post('/genre/store', 'GenreController@store')->name('storeGenre');
Route::get('/genre/edit/{id}','GenreController@edit')->name('editGenre');
Route::post('/genre/update/{id}','GenreController@update')->name('updateGenre'); 
Route::get('/genre/delete/{id}','GenreController@destroy')->name('deleteGenre');

//message
Route::get('/message/{id}','MessageController@create')->name('createMessage');
Route::post('/message/{id}/store','MessageController@store')->name('storeMessage');
Route::get('/message','MessageController@index')->name('inbox');
Route::get('/message/{id}/delete','MessageController@destroy')->name('deleteMessage');