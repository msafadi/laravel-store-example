<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
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
        
        JsonResource::withoutWrapping();

        Validator::extend('filter', function($attribute, $value, $params) {
            return ! in_array(strtolower($value), $params);
        }, 'The value is prohipted!');

        Paginator::useBootstrapFour();
        //Paginator::defaultView('pagination.custom');
    }
}
