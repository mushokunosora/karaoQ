<?php

use Illuminate\Support\Facades\Route;
use App\Models\Song;

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
    $queue=Song::all();
    $length=sizeof($queue);
    return view('main')->with([
        'queue'=> $queue,
        'length' => $length
    ]);
});
Route::get('/home', function () {
    $queue=Song::all();
    $length=sizeof($queue);
    return view('home')->with([
        'queue'=> $queue,
        'length' => $length
    ]);
});


Route::get('/account', function () {
    $queue=Song::all();
    $length=sizeof($queue);
    return view('home')->with([
        'queue'=> $queue,
        'length' => $length
    ]);
});
Route::get('/newsong', 'SongController@newsong');
Route::get('/del', 'SongController@dropsong');
Route::get('/next', 'SongController@nextsong');

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');



