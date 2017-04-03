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


Route::get('/', 'ItemController@index')->name('home');

Route::post('search', 'ItemController@search');


Auth::routes();

Route::get('/logout','Auth\LoginController@logout');

Route::group(['prefix' => 'admin','middleware'=>'auth'], function (){
	
	Route::get('/add','ItemController@add');

	Route::post('/add','ItemController@store');

	Route::get('/delete/{id}','ItemController@deleteItem');

	Route::get('edit/{id}','ItemController@editItem');

	Route::post('edit/{id}','ItemController@updateItem');

    Route::get('/','UserController@userIndex')->name('admin.index');

    Route::get('/editProfile/{id}','UserController@editProfile');

    Route::post('/editProfile/{id}','UserController@updateProfile');
    
    Route::get('/itemDetails/{id}', 'ItemController@itemDetails')->name('itemDetails');

	Route::post('/itemDetails/bid', 'ItemController@bidItem')->name('itemDetails');
});

