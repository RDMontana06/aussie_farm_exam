<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/kangaroos', 'KangarooController@index')->name('kangaroos.index');
Route::get('/kangaroos/create', 'KangarooController@create')->name('kangaroos.create');
Route::post('/kangaroos', 'KangarooController@store')->name('kangaroos.store');
Route::get('/kangaroos/{kangaroo}/edit', 'KangarooController@edit')->name('kangaroos.edit');
Route::patch('/kangaroos/{id}', 'KangarooController@update');