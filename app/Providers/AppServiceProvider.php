<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Certification;
use App\Observers\CertificationObserver;

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
   

    public function boot()
    {
        Certification::observe(CertificationObserver::class);
    }


    
}
