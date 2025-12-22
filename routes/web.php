<?php

use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'sandbox');

Route::get('/wallets', [WalletController::class, 'index'])->name('wallets.index');
