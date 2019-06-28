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

Route::get('/justice/export', 'JusticeExportController@export')->name('justice.export');

Route::get('/conflict/import', 'ConflictController@import');

Route::get('/conflict-series/search', 'ConflictSeriesSearchController@index')->name('conflict-series.search');
Route::resource('/conflict-series', 'ConflictSeriesController');

Route::resource('/conflict', 'ConflictController');
Route::resource('/dyadic-conflict', 'DyadicConflictController');

Route::resource('/conflict/{conflict}/justice', 'JusticeController');

Route::resource('/user', 'UserController')->middleware('auth');
Route::resource('/user/{user}/task', 'UserTaskController', ['as' => 'user'])->middleware('auth');

Route::resource('/task/geo', 'TaskGeoController', ['as' => 'task'])->middleware('auth');

Route::resource('/task', 'TaskController')->middleware('auth');

// Form CRUDDING not ready for v 1.0
//Route::resource('form', 'FormController')->middleware('auth');
Route::get('form/{form}/schema', 'FormSchemaController@show');

Route::middleware(['auth'])->group(function () {
    Route::get('form/{form}/schema/edit', 'FormSchemaController@edit')->name('form.schema.edit');
    Route::put('form/{form}/schema', 'FormSchemaController@update')->name('form.schema.update');

    Route::post('form/{form}/item', 'FormItemController@store')->name('form.item.store');
    Route::put('form/{form}/item', 'FormItemController@update')->name('form.item.update');
    Route::delete('form/{form}/item', 'FormItemController@destroy')->name('form.item.destroy');
});


//Route::put('form/{form}/')

Auth::routes(['register' => false]);

