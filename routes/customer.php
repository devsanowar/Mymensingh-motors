<?php

use App\Http\Controllers\Auth\Customer\CustomerDashboardController;
use App\Http\Controllers\Auth\Customer\CustomerRegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->group(function(){
    Route::get('register-page', [CustomerRegisterController::class, 'registerPage'])->name('customer.register.page');
    Route::post('register', [CustomerRegisterController::class, 'customerRegister'])->name('customer.register');

    Route::middleware(['customer'])->group(function () {
        Route::get('dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');
    });
});