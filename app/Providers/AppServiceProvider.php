<?php

namespace App\Providers;

use App\Models\User;
use App\Models\WebsiteSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = WebsiteSetting::select('id', 'website_logo', 'website_title', 'phone')->first();

        if ($setting) {
            config(['app.name' => $setting->website_title ?? config('app.name')]);
            config(['app.website_logo' => $setting->website_logo]);

            View::share('website_setting', $setting);
        } else {
            config(['app.name' => config('app.name')]);
            config(['app.website_logo' => null]);

            View::share('website_setting', null);
        }

        Paginator::useBootstrap();
        Toastr::useVite();
    }
}
