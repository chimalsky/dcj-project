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

Route::get('/conflict/import', 'ConflictController@import');
Route::resource('/conflict', 'ConflictController');

Route::resource('/justice/trial', 'TrialController');
Route::resource('/history', 'HistoryController');