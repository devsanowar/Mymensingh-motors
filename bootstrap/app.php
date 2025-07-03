<?php

use App\Http\Middleware\CheckPermission;
use App\Http\Middleware\isUser;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isCustomer;
use App\Http\Middleware\LogVisitorInfo;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')->group(base_path('routes/admin.php'));
            Route::middleware('web')->group(base_path('routes/api.php'));
            Route::middleware('web')->group(base_path('routes/developer.php'));
            Route::middleware('web')->group(base_path('routes/customer.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => isAdmin::class,
            'user' => isUser::class,
            'customer' => isCustomer::class,
            'logVisitorInfo' => LogVisitorInfo::class,
            'permission' => CheckPermission::class,
        ]);

        // 👇 Correct way to make it global in Laravel 11
        // $middleware->prependToGroup('web', LogVisitorInfo::class);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
