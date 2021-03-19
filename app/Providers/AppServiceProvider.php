<?php

namespace App\Providers;

use App\Models\Site;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        Schema::defaultStringLength(191);

        View::composer("utilisateurs.user-form", function($view) {
           return $view->with("sites", Site::latest()->get());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
