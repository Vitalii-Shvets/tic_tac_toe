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


use Illuminate\Support\Arr;

//Route::get('/', function () {
//    return view('game/index');
//});
Route::get('/start', 'Game\GameViewController@main');

//Route::get('/playing/{game}', function () {
//    return view('game/game');
//});

Route::get('/playing/{game}', 'Game\GameViewController@game');
