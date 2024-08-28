<?php

namespace App\Providers;

use App\Models\Currency;
use App\Models\PaymentMethod;
use App\Models\Policy;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer("layouts.__partials.store.footer", function ($view) {
            $currencies = Currency::where("active", true)->get();
            $currencyDefault = Currency::where("is_default", true)->first();
            $paymentMethods = PaymentMethod::where("active", true)->get();
            $policies = Policy::all();
            $view->with(
                [
                    "currencies" => $currencies,
                    "currencyDefault" => $currencyDefault,
                    "paymentMethods" => $paymentMethods,
                    "policies" => $policies,
                ]
            );
        });
    }
}
