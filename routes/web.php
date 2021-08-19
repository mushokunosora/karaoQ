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

Route::get('/', function () {
    return view('main');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/account', function () {
    return view('home');
});
Route::get('/coursework', function () {
    return view('coursework');
});
Route::get('/achievements', function () {
    return view('achievements');
});
Route::get('/portfolio', function () {
    return view('gallery');
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::post('account/profilesave','AccountController@profileSave');
Route::post('account/profileimgsave','AccountController@storeAlpha');
Route::post('account/profileimgdel','AccountController@destroytmppic');

