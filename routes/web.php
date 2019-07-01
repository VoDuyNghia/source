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
route::pattern('name' ,'(.*)');
route::pattern('id', '([0-9]*)');


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

	//// Quản lý Category

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


	Route::get('category/edit/{id}' , [
		'uses' => 'CatController@get_Edit',
		'as'   => 'admin.cat.edit'
	]);

	Route::post('category/edit/{id}' , [
		'uses' => 'CatController@post_Edit',
		'as'   => 'admin.cat.edit'
	]);

	Route::get('delete_category', 'CatController@post_Delete')->name('delete_category');


	//// Quản lý Users

	Route::get('user', 'UserController@index')->name('admin.users.index');
	Route::get('user/add', 'UserController@get_Add')->name('admin.users.add');
	Route::post('user/add', 'UserController@post_Add')->name('admin.users.add');
	Route::post('user/change_pass', 'UserController@post_ChangePass')->name('change_pass');
	Route::post('user/active_user', 'UserController@active_User')->name('active_user');


	// Quản lý Products

	Route::get('product', 'ProductController@index')->name('admin.product.index');
	Route::get('product/add', 'ProductController@get_Add')->name('admin.product.add');
	Route::post('product/add', 'ProductController@post_Add')->name('admin.product.add');
	Route::post('product/delete', 'ProductController@post_Delete')->name('delete_product');
	Route::get('product/edit/{id}', 'ProductController@get_Edit')->name('admin.product.edit');
	Route::post('product/edit/{id}', 'ProductController@post_Edit')->name('admin.product.edit');


	// Quản lý Blogs

	Route::get('news', 'NewsController@index')->name('admin.news.index');
	Route::get('news/add', 'NewsController@get_Add')->name('admin.news.add');
	Route::post('news/add', 'NewsController@post_Add')->name('admin.news.add');
	Route::get('delete_news', 'NewsController@post_Delete')->name('delete_news');
	Route::get('news/edit/{id}', 'NewsController@get_Edit')->name('admin.news.edit');
	Route::post('news/edit/{id}', 'NewsController@post_Edit')->name('admin.news.edit');

});


