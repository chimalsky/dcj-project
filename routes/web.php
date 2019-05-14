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

Route::get('/', 'ConflictSeriesController@index')->name('home');

Route::get('/conflict/import', 'ConflictController@import');

Route::get('/conflict-series/search', 'ConflictSeriesSearchController@index')->name('conflict-series.search');
Route::resource('/conflict-series', 'ConflictSeriesController');

Route::resource('/conflict', 'ConflictController');

Route::resource('/conflict/{conflict}/justice', 'JusticeController');

Route::resource('/user', 'UserController')->middleware('auth');
Route::resource('/task', 'TaskController')->middleware('auth');



Auth::routes(['register' => false]);

