<?php

use App\Http\Controllers\Project\UpdateProject;
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
    Route::get('/projects',App\Http\Controllers\Project\ShowProject::class);
    Route::post('/projects',\App\Http\Controllers\Project\StoreProject::class);
    Route::post('/projects/{project}/edit', UpdateProject::class);
    Route::delete('/projects/{project}',\App\Http\Controllers\Project\DeleteProject::class);
});
//Route::get('/projects',App\Http\Controllers\Project\ShowProject::class);
