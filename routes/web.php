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


Route::get('/','HomeController@landing')->name('landing');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/recipes', 'RecipeController@index')->name('recipes');
Route::get('/recipes/all', 'RecipeController@all')->name('allrecipes');
Route::get('/recipes/create', 'RecipeController@create')->name('create')->middleware('auth'); 
Route::get('/recipes/show/{id}', 'RecipeController@show')->name('show');
Route::get('/recipes/edit/{id}', 'RecipeController@edit')->name('edit')->middleware('auth'); 
Route::get('/recipes/destroy/{id}', 'RecipeController@destroy')->name('destroy')->middleware('auth'); 
Route::post('/recipes/store/', 'RecipeController@store')->name('store')->middleware('auth'); 
Route::patch('/recipes/update/{id}', 'RecipeController@update')->name('update')->middleware('auth'); 
Route::get('/recipes/search/{search?}', 'RecipeController@search');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/authcheck', 'HomeController@authcheck');

Route::get('/user/show/{id}', 'HomeController@showuser')->name('usershow');
Route::patch('/home/user/update/{id}', 'HomeController@updateuser')->name('updateuser')->middleware('auth');
Route::get('/home/user/edit/', 'HomeController@edituser')->name('useredit')->middleware('auth');
Route::delete('/home/user/delete/{id}', 'HomeController@deleteuser')->name('userdelete')->middleware('auth');

Route::get('/home/users', 'HomeController@showusers')->name('usersshow');
Route::get('/home/alluser', 'HomeController@allusers')->name('alluser');
Route::post('/home/text', 'HomeController@text')->name('test');

Route::get('/comments/{id}','CommentController@index')->name('comments');
Route::post('/comment/create', 'CommentController@store')->name('commentadd')->middleware('auth');
Route::patch('/comment/update', 'CommentController@update')->name('commentupdate')->middleware('auth');


Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


// // Pass everything to vue except the /api/ routes.
// Route::get('/{any?}', function () {
//     return view('spa');
// })->where('any', '^(?!api\/)[\/\w\.-]*');