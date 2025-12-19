<?php

use App\Http\Controllers\Api\SettleController;
use App\Http\Controllers\Api\SupportedController;
use App\Http\Controllers\Api\VerifyController;
use Illuminate\Support\Facades\Route;

Route::post('/verify', VerifyController::class);
Route::post('/settle', SettleController::class);
Route::get('/supported', SupportedController::class);
