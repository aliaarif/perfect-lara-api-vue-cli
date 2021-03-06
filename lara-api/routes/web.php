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



//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::group(['middleware' => 'web'], function () {
    //Route::auth();
    //Auth::routes();
   // Route::get('/home', 'HomeController@index');
//});
//Route::post('sendmessage', 'ChatController@sendMessage');
//Route::get('get-vendor/{id?}', 'ChatController@getVendor');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('friends', 'FriendController@index');
Route::get('chat', 'ChatController@index')->name('chat.index');
Route::get('chat/{id}', 'ChatController@show')->name('chat.show');
Route::post('chat/get-chat/{id}', 'ChatController@getChat');

