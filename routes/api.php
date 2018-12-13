<?php

use Illuminate\Http\Request;
use App\Task;

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

Route::post('/register', 'Auth\RegisterController@register');

Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');


Route::group(['middleware' => 'auth:api'], function() {
	Route::get('/tasks', 'TaskController@apiIndex');
	Route::post('/tasks', 'TaskController@apiSave')->name('apiAddTask');
	Route::put('/tasks/{id}', 'TaskController@apiUpdate')->name('apiUpdateTask');
	Route::delete('/tasks/{task}', 'TaskController@apiDelete')->name('apiDeleteTask');
});