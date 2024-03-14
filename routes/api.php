<?php

use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

Route::controller(CryptocurrencyController::class)->group(function(){
    Route::get('/cryptocurrency', 'index');
    Route::get('/cryptocurrency/{id}', 'show');
    Route::post('/cryptocurrency', 'store');
});

Route::controller(GroupController::class)->group(function(){
    Route::get('/groups', [GroupController::class, 'index']);
    Route::get('/groups/{groupId}', [GroupController::class, 'show']);
    Route::post('/groups', [GroupController::class, 'store']);
    Route::delete('/groups/{id}', [GroupController::class, 'destroy']);
});