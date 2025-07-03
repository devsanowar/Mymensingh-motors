<?php

use App\Http\Controllers\Auth\Customer\CustomerRegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->group(function(){
    Route::get('/register-page', [CustomerRegisterController::class, 'registerPage'])->name('customer.register.page');
});