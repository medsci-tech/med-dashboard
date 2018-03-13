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

/*
    * 前端路由，交由vue-router，注意放在最后！
*/
Route::resource('kafka','Kafka\TestController');
Route::any('/{any?}', function () {
    return view('app');
})->name('home')->where('any','.*');


