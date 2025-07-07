<?php

use App\Http\Controllers\Auth\Customer\CustomerDashboardController;
use App\Http\Controllers\Auth\Customer\CustomerLoginController;
use App\Http\Controllers\Auth\Customer\CustomerRegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->group(function(){
    Route::get('register-page', [CustomerRegisterController::class, 'registerPage'])->name('customer.register.page');
    Route::post('register', [CustomerRegisterController::class, 'customerRegister'])->name('customer.register');

    // customer login route
    Route::get('login-page', [CustomerLoginController::class, 'loginPage'])->name('customer.login.page');
    Route::post('login', [CustomerLoginController::class, 'loginFormSubmit'])->name('customer.login');
    Route::post('logout', [CustomerLoginController::class, 'customerLogout'])->name('customer.logout');


    Route::middleware(['customer'])->group(function () {
        Route::get('dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');
            Route::get('/orders/{order}', [CustomerDashboardController::class, 'show'])
        ->name('customer.orders.show');
        Route::patch('/orders/{order}/cancel', [CustomerDashboardController::class, 'cancel'])->name('orders.cancel');
        Route::get('/orders/{order}/invoice', [CustomerDashboardController::class, 'invoice'])->name('orders.invoice');
    });
});