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

/**
 * Работа с объявлениями
 */

Route::get('/', 'IndexController@getIndex')->name('index');

Route::match(['get','post'],'/create', 'IndexController@createAdv')->middleware('auth')->name('createAdv');

Route::get('/show/{id_adv}', 'IndexController@showAdv')->name('showAdv');

Route::get('cat/show/{id_cat}', 'IndexController@showCat')->name('showCat');

Route::get('user/show/{id_user}', 'IndexController@myAdv')->name('myAdv');

/**
 * Работа с админкой
 */

Route::get('/admin/{param}', 'AdminController@showMod')->name('showMod');

Route::get('/admin/change/{id}', 'AdminController@changeStatus')->name('changeStatus');


/**
 * Авторизация
 */
Route::match(['get','post'],'/signup', 'AuthController@signUp')->middleware('guest')->name('authSignup');

Route::match(['get','post'],'/signin', 'AuthController@signIn')->middleware('guest')->name('authSignin');

Route::get('/signout', 'AuthController@signOut')->name('authSignout');