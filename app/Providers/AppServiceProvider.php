<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** We can unguard model $fillable properties
        *But it's not a good practice
        */

        //Model::unguard();
        // we can use manythings by vendor:publishing like bootstrap pagintion
        //Paginator::useBootstrapFive();
    }
}
