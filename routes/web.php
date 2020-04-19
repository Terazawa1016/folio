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

Auth::routes();

// Route::get('/top', 'HomeController@index')->name('top');


//API商品ページ
Route::get('/shop', 'HomeController@shoplist')->name('shop');
Route::post('/preference', 'HomeController@preference')->name('preference');

Route::get('/favorite', 'HomeController@favorite')->name('favorite');

Route::get('/rank', 'HomeController@rank')->name('rank');
Route::get('/create', 'HomeController@create')->name('create');
Route::post('/store','HomeController@store')->name('store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'BookController@index')->name('home');
