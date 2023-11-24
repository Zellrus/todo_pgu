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
    // null - получение всех проектов юзера;
    // int project_id - получение проекта по его id;
    // boot isdetail - получение детального ответа (по умолчанию true)
    Route::get('/projects',App\Http\Controllers\Project\ShowController::class);
    Route::post('/projects',\App\Http\Controllers\Project\StoreController::class);
    Route::patch('/projects/{project}', \App\Http\Controllers\Project\UpdateController::class);
    Route::delete('/projects/{project}',\App\Http\Controllers\Project\DeleteController::class);


    //колонки
    // int project_id - получение колонок по id проекта;
    // int column_id - получение колонки по ее id
    Route::get('/columns',\App\Http\Controllers\Column\ShowController::class,);
    Route::post('/columns',\App\Http\Controllers\Column\StoreController::class);
    Route::patch('/column/{column}', \App\Http\Controllers\Column\UpdateController::class);
    Route::delete('/column/{column}',\App\Http\Controllers\Column\DeleteController::class);


    //задачи
    // int project_id -получение задач по id проекта;
    // int column_id - получение задачи по id колонки;
    // int task_id - получение задачи по ее id
    Route::get('/tasks',\App\Http\Controllers\Task\ShowController::class);
    Route::post('/tasks',\App\Http\Controllers\Task\StoreController::class);
    Route::patch('/tasks/{task}', \App\Http\Controllers\Task\UpdateController::class);
    Route::delete('/tasks/{task}',\App\Http\Controllers\Task\DeleteController::class);

});

