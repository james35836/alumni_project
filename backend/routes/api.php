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

Route::post('/register/submit',		'AuthController@register_submit');
Route::get('/get_group',			'GroupController@index');
Route::options('*', function(){
    return response('', 200);
});
Route::group(['middleware' => ['auth:api']],function(){
    
    Route::get('/user_info', 'Controller@get_user_info');

    Route::get('/message', 'MessageController@index');
    Route::post('/send_message', 'MessageController@store');

    /*USER ROUTES*/
    Route::resource('users', 'UserController');
    Route::resource('announcements', 'AnnouncementController');

});
