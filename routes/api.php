<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('auth:api')->get('/message_react', function (Request $request) {
//    return $request->user();
//});

//Route::get('/message_react', 'UserprofileController@react');
Route::get('/message_react', 'MessageController@MessageHistory');
//Route::get('/message_react', 'MainController@sendmessage');
//Route::get('/message/{id}', 'MainController@sendmessage');
Route::post('/main', 'MainController@modal');
Route::post('/message', 'MessageController@Messagedetail');
//Route::post('/message', 'MessageController@PostMessage');