<?php

use Illuminate\Support\Facades\Storage;

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

Route::get('/' ,'PagesController@index');
Route::get('/temperature' ,'PagesController@temperature');
Route::get('/humidity' ,'PagesController@humidity');
Route::get('/pressure' ,'PagesController@pressure');
Route::get('/air' ,'PagesController@air');
Route::get('/gas' ,'PagesController@gas');
Route::get('/uv' ,'PagesController@uv');
Route::get('/settings' ,'PagesController@settings');
Route::post('/download','PagesController@downloadSelectedRange');
Route::post('/downloadAll','PagesController@downloadAll');
//Route::get('/test','PagesController@test');