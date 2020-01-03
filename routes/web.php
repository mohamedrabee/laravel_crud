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

Route::resource('/student', 'StudentController');
//Route::post('/','StudentController@store')->name('st');
//Route::get('/creat', 'StudentController@create')->name('create');
