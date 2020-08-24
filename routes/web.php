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

Route::get('/', 'IndexController@getIndex')->name('index');

Route::match(['get','post'],'/create', 'IndexController@createAdv')->name('createAdv');


/**
 * Авторизация
 */
Route::match(['get','post'],'/signup', 'AuthController@signUp')->name('authSignup');

Route::match(['get','post'],'/signin', 'AuthController@signIn')->name('authSignin');