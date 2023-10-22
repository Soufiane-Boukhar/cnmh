<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\UserRepository;
use App\Repository\PatientRepository;
use App\Repository\ElequantPatientRepository;
use App\Repository\ElequantUserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
   
    public function register(): void
    {
        $this->app->bind(UserRepository::class, ElequantUserRepository::class);
        $this->app->bind(PatientRepository::class, ElequantPatientRepository::class);
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}