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
use Illuminate\Http\Request;

use App\Task;
use App\User;


Route::get('/', function () {
	// dd(__DIR__);
    return view('main');
});

//tasks
Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::post('/tasks', 'TaskController@save')->name('addTask');
Route::put('/tasks/{id}', 'TaskController@update')->name('updateTask');
Route::delete('/tasks/{task}', 'TaskController@delete')->name('deleteTask');


Route::get('/api', function () {
	$testTasks = Task::select(['id'])->where('name', 'test')->first();
	$testAPI_token = User::select(['api_token'])->first();

    return view('api')->with(['testTasks'=>$testTasks, 'api_token'=>$testAPI_token,]);
})->name('myApi');


//tobay
Route::get('/tobays', 'TobayController@index')->name('toBays');
Route::post('/tobays', 'TobayController@save')->name('addTobay');
Route::put('/tobays/{id}', 'TobayController@update')->name('updateTobay');
Route::delete('/tobays/{tobay}', 'TobayController@delete')->name('deleteTobay');

//toread
Route::get('/toreads', 'ToReadController@index')->name('toReads');
Route::post('/toreads', 'ToReadController@save')->name('addToRead');
Route::put('/toreads/{id}', 'ToReadController@update')->name('updateToRead');
Route::delete('/toreads/{toRead}', 'ToReadController@delete')->name('deleteToRead');

//totravel
Route::get('/totravels', 'ToTravelController@index')->name('toTravel');
Route::post('/totravels', 'ToTravelController@save')->name('addToTravel');
Route::put('/totravels/{id}', 'ToTravelController@update')->name('updateToTravel');
Route::delete('/totravels/{totravel}', 'ToTravelController@delete')->name('deleteToTravel');

