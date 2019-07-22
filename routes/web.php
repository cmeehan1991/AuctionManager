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

Route::get('/signin', function(){
	return view('signin');
});

Route::get('/about', function(){
	return view('about');
});

Route::get('/auction-manager', function(){
	$view = View::make('manager')->nest('content', 'page-templates.home');
	return view('manager')->nest('content', 'page-templates.home');
});

Route::get('auction-manager#!/auctions', function(){
	$view = View::make('manager')->nest('content', 'page-templates.auctions');
	return $view;
});


Route::get('auction-manager#!/auction-items/edit/:ID', function(){
	$view = View::make('manager')->nest('content', 'page-templates.auction-item');
	return $view;
});

Route::post('login', 'UserController@login');
Route::post('getItems', 'ItemsController@getItems');
Route::post('getSingleItem', 'ItemsController@getSingleItem');
Route::post('saveSingleItem', 'ItemsController@saveSingleItem');
Route::post('deleteSingleItem', 'ItemsController@deleteItem');
