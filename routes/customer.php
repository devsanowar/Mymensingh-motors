<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Customer\CustomerLoginController;
use App\Http\Controllers\Auth\Customer\CustomerProfileController;
use App\Http\Controllers\Auth\Customer\CustomerRegisterController;
use App\Http\Controllers\Auth\Customer\CustomerDashboardController;

Route::prefix('customer')->group(function(){
    Route::get('register-page', [CustomerRegisterController::class, 'registerPage'])->name('customer.register.page');
    Route::post('register', [CustomerRegisterController::class, 'customerRegister'])->name('customer.register');

    // customer login route
    Route::get('login-page', [CustomerLoginController::class, 'loginPage'])->name('customer.login.page');
    Route::post('login', [CustomerLoginController::class, 'loginFormSubmit'])->name('customer.login');
    Route::post('logout', [CustomerLoginController::class, 'customerLogout'])->name('customer.logout');


    Route::middleware(['customer'])->group(function () {
        Route::get('dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');
        Route::get('/orders/{order}', [CustomerDashboardController::class, 'show'])->name('customer.orders.show');
        Route::patch('/orders/{order}/cancel', [CustomerDashboardController::class, 'cancel'])->name('orders.cancel');
        Route::get('/orders/{order}/invoice', [CustomerDashboardController::class, 'invoice'])->name('orders.invoice');
        Route::post('/account/update', [CustomerProfileController::class, 'update'])->name('customer_account.update');
        Route::post('/track-order', [CustomerDashboardController::class, 'trackOrder'])->name('order.track');
        Route::get('/get-upazilas/{district_id}', [CustomerDashboardController::class, 'getUpazilas']);
        Route::post('/update-address', [CustomerDashboardController::class, 'updateAddress'])->name('customer.updateAddress');
    });
});