<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->name('api.v1.')->group(function () {

    Route::apiResource('tasks', TaskController::class)
        ->where(['task' => '[0-9]+'])
        ->only(['index', 'show']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::apiResource('tasks', TaskController::class)
            ->where(['task' => '[0-9]+'])
            ->except(['index', 'show']);

    });
});