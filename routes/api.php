<?php

use Illuminate\Http\Request;

/*
|----------------------------------------th----------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v0'], function () {
    Route::any('test', 'ThirdPartyInterfaces\V0\TestConnectionInterfaceController@handleRequest')->middleware('client');
});

Route::group(['prefix' => 'v1'], function () {
    Route::any('log', 'ThirdPartyInterfaces\V1\LogController@handleRequest')->middleware('client');
    Route::any('register-log', 'ThirdPartyInterfaces\V1\RegisterLogController@handleRequest')->middleware('client');
    Route::any('wechat-register-log', 'ThirdPartyInterfaces\V1\WechatRegisterLogController@handleRequest')->middleware('client');
    Route::any('login-log', 'ThirdPartyInterfaces\V1\LoginLogController@handleRequest')->middleware('client');
    Route::any('wechat-login-log', 'ThirdPartyInterfaces\V1\WechatLoginLogController@handleRequest')->middleware('client');
    Route::any('user-profile-log', 'ThirdPartyInterfaces\V1\ProfileLogController@handleRequest')->middleware('client');
});

Route::group(['prefix' => 'statistics/mime'], function () {
    Route::any('register', 'Dashboard\RegisterController@handleRequest');
    Route::any('dau', 'Dashboard\DAUController@handleRequest');
    Route::any('profile', 'Dashboard\ProfileController@handleRequest');

    Route::any('wechat-register', 'Dashboard\WechatRegisterController@handleRequest');
    Route::any('wechat-dau', 'Dashboard\WechatDAUController@handleRequest');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

