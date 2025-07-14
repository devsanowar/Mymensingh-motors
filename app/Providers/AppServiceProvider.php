<?php

namespace App\Providers;

use App\Models\User;
use App\Models\WebsiteSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
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
        $setting = WebsiteSetting::select('id', 'website_logo', 'website_title', 'phone', 'footer_content', 'address')->first();


        config(['app.name' => $setting->website_title ?? config('app.name')]);
        config(['app.website_logo' => $setting->website_logo ?? null]);
        config(['app.footer_content' => $setting->footer_content ?? null]);
        config(['app.address' => $setting->address ?? null]);
        config(['app.phone' => $setting->phone ?? null]);

        View::share('website_setting', $setting);



        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $permissions = Auth::user()->permissions->pluck('permission_key')->toArray();
                $view->with('userPermissions', $permissions);
            }
        });


        Paginator::useBootstrap();

        Toastr::useVite();
    }
}
