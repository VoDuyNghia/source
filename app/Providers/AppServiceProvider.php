<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Collection;
use App\Models\District;
use App\Models\Choose;
use Illuminate\Support\Facades\View;

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
        View::share('objCollection', Collection::orderbyDESC("position")->get());
        View::share('objDistrict', District::all());
        View::share('objChoose', Choose::all());
    }
}
