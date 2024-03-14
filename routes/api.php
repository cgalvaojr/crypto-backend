<?php

use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/cryptocurrency/{sort?}/{sortOrder?}', [CryptocurrencyController::class, 'index']);

Route::post('/cryptocurrency', [CryptocurrencyController::class, 'store']);

Route::get('/groups', [GroupController::class, 'index']);
Route::get('/groups/{groupId}', [GroupController::class, 'show']);
Route::post('/groups', [GroupController::class, 'store']);
Route::patch('/groups', [GroupController::class, 'update']);
Route::delete('/groups', [GroupController::class, 'destroy']);