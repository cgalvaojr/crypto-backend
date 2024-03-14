<?php

use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

Route::controller(CryptocurrencyController::class)->group(function(){
    Route::get('/cryptocurrency', 'index');
    Route::get('/cryptocurrency/{id}', 'show');
    Route::post('/cryptocurrency', 'store');
});

Route::get('/groups', [GroupController::class, 'index']);
Route::get('/groups/{groupId}', [GroupController::class, 'show']);
Route::post('/groups', [GroupController::class, 'store']);
Route::patch('/groups', [GroupController::class, 'update']);
Route::delete('/groups', [GroupController::class, 'destroy']);