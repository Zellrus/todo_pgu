<?php

use App\Http\Controllers\Project;
use App\Http\Controllers\Column;
use App\Http\Controllers\Task;
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
    // bool isdetail - получение детального ответа (по умолчанию true)
    Route::get('/projects',Project\ShowController::class);
    Route::post('/projects',Project\StoreController::class);
    Route::patch('/projects/{project}', Project\UpdateController::class);
    Route::delete('/projects/{project}',Project\DeleteController::class);


    //колонки
    // int project_id - получение колонок по id проекта;
    // int column_id - получение колонки по ее id
    Route::get('/columns',Column\ShowController::class,);
    Route::post('/columns',Column\StoreController::class);
    Route::patch('/column/{column}', Column\UpdateController::class);
    Route::delete('/column/{column}',Column\DeleteController::class);


    //задачи
    // int project_id -получение задач по id проекта;
    // int column_id - получение задачи по id колонки;
    // int task_id - получение задачи по ее id
    Route::get('/tasks',Task\ShowController::class);
    Route::post('/tasks',Task\StoreController::class);
    Route::patch('/tasks/{task}',Task\UpdateController::class);
    Route::delete('/tasks/{task}',Task\DeleteController::class);

});

