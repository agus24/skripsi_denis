<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class FrontProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['front.index','front.aboutus','front.termcondition'],"App\Front\ViewComposer");
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
