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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'],function (){
    //проекты
    Route::get('/projects',[App\Http\Controllers\Project\ShowController::class,'all']); // получение всех проектов юзера без подробностей
    Route::get('/projects/{project}',[App\Http\Controllers\Project\ShowController::class,'one']); //получение подробностей одного проекта
    Route::post('/projects',\App\Http\Controllers\Project\StoreController::class);
    Route::patch('/projects/{project}', \App\Http\Controllers\Project\UpdateController::class);
    Route::delete('/projects/{project}',\App\Http\Controllers\Project\DeleteController::class);


    //колонки
    Route::get('/columns/{project}',[\App\Http\Controllers\Column\ShowController::class,'all']); //получение колонок по id проекта
    Route::get('/column/{id}',[\App\Http\Controllers\Column\ShowController::class,'one']); //получение колонки по его id
    Route::post('/columns',\App\Http\Controllers\Column\StoreController::class);
    Route::patch('/column/{column}', \App\Http\Controllers\Column\UpdateController::class);
    Route::delete('/column/{column}',\App\Http\Controllers\Column\DeleteController::class);


    //задачи
    Route::get('/tasks/{column}/',[\App\Http\Controllers\Task\ShowController::class,'all']); // получение задач по id колонки
    Route::get('/task/{id}',[\App\Http\Controllers\Task\ShowController::class,'one']); //получение задачи по его id
    Route::post('/tasks',\App\Http\Controllers\Task\StoreController::class);
    Route::patch('/tasks/{task}', \App\Http\Controllers\Task\UpdateController::class);
    Route::delete('/tasks/{task}',\App\Http\Controllers\Task\DeleteController::class);



});

