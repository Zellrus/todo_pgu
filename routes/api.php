<?php

use App\Http\Controllers\Project\UpdateController;
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
    Route::get('/projects',[App\Http\Controllers\Project\ShowController::class,'all']);
    Route::get('/projects/{project}',[App\Http\Controllers\Project\ShowController::class,'one']);
    Route::post('/projects',\App\Http\Controllers\Project\StoreController::class);
    Route::patch('/projects/{project}', UpdateController::class);
    Route::delete('/projects/{project}',\App\Http\Controllers\Project\DeleteController::class);


    Route::post('/tasks',\App\Http\Controllers\Task\StoreController::class);
    Route::patch('/tasks/{tasks}', \App\Http\Controllers\Task\UpdateController::class);
});

