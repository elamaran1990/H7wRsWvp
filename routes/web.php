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

Route::get('/', 'ServiceRequestsController@index')->name('home');
Route::get('{id}', 'ServiceRequestsController@edit')->name('edit');
Route::post('ticket/update','ServiceRequestsController@update')->name('update');
Route::get('ticket/create','ServiceRequestsController@create')->name('create');
Route::post('ticket/store','ServiceRequestsController@store')->name('store');
Route::get('ticket/get_vehicle','ServiceRequestsController@get_vehicle')->name('get_vehicle');
Route::get('ticket/delete/{id}', 'ServiceRequestsController@delete')->name('delete');
