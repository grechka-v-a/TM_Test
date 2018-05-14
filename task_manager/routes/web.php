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

Route::get('/', 'TasksController@index');

Route::get('/edit', 'TasksController@create');
Route::post('/edit', 'TasksController@store');

Route::get('/edit/{task}', 'TasksController@edit');
Route::patch('/edit/{task}', 'TasksController@update');

Route::delete('/delete/{task}', 'TasksController@destroy');
