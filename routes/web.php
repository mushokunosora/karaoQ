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
Route::get('/coursework', function () {
    return view('coursework');
});
Route::get('/achievements', function () {
    return view('achievements');
});
Route::get('/portfolio', function () {
    return view('gallery');
});
