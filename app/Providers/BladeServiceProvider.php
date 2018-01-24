<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('headerOrder', function ($expression) {
            return "<?php if($expression == 1): ?>
                        <tr style='background-color:#ffffac'>
                    <?php elseif($expression == 2):?>
                        <tr style='background-color:#b5fdb5'>
                    <?php elseif($expression == 3): ?>
                        <tr style='background-color:gray;color:white' class='batal'>
                    <?php else:?>
                        <tr style='background-color:#ffa9a9'>
                    <?php endif; ?>";
        });
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
