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

Route::namespace('House')->group( function() {
    Route::get('',  [
        'uses' => 'IndexController@index',
        'as'   => 'house.index.index'
    ]);
});

Route::namespace('Admin')->prefix('admin')->group( function() {
	Route::get('dashboard' , [
		'uses' => 'DashboardController@index',
		'as'   => 'admin.index.index'
	]);

	Route::get('category' , [
		'uses' => 'CatController@index',
		'as'   => 'admin.cat.index'
	]);


	Route::get('category/add' , [
		'uses' => 'CatController@get_Add',
		'as'   => 'admin.cat.add'
	]);


	Route::post('category/add' , [
		'uses' => 'CatController@post_Add',
		'as'   => 'admin.cat.add'
	]);

});
