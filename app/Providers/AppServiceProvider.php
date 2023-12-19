<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Contracts\ForgetPasswordInterface;
use App\Services\SmsImplementation;
use App\Services\WhatsAppImplementation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ForgetPasswordInterface::class, function ($app) {
            // You can conditionally choose the implementation based on user preferences or other factors
            // For simplicity, I'll use the SmsForgetPasswordAdapter as the default implementation
            return $app->make(SmsImplementation::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
    }
}
