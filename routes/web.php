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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('groups', 'GroupController');
Route::resource('items', 'ItemController');

Route::post('item/{id}/claim', 'ItemController@claimItem')->name('items.claim');
Route::post('item/{id}/upload', 'ItemController@upload');

Route::resource('events', 'EventController');
