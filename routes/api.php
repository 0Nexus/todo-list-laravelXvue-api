<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/getdata', 'TodosController@index');
Route::post('/getdata', 'TodosController@store');
Route::get('/todos/edit/{todo_id}','Todoscontroller@edit');
Route::patch('/todos/edit/{todo_id}', 'TodosController@update');
Route::delete('/todos/{todo_id}', 'TodosController@destroy');
