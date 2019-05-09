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

Route::get('/', 'ConflictController@index')->name('home');

Route::get('/conflict/import', 'ConflictController@import');
Route::resource('/conflict', 'ConflictController');

Route::resource('/justice', 'JusticeController');

Route::resource('/justices/Amnesty', 'AmnestyController');
Route::resource('/justices/trial', 'TrialController');

Route::resource('/history', 'HistoryController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
