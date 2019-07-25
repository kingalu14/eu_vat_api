<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repository\Vat\VatInformationRepository;
use App\Repository\Vat\EloquentVatInformation;

use App\Repository\Archieve\ArchieveRepository;
use App\Repository\Archieve\EloquentArchieve;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(VatInformationRepository::class,EloquentVatInformation::class); 
        $this->app->singleton(ArchieveRepository::class,EloquentArchieve::class); 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
