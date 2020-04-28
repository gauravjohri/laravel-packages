<?php

namespace Vendor\Module;

use Illuminate\Support\ServiceProvider;

class VendorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Http\Middleware\StartSession');
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // print_r(Session::all());
        // exit();
        $this->app->make('Vendor\Module\VendorController');
        $this->loadViewsFrom(__DIR__.'/views', 'module');
        include __DIR__.'/routes/routes.php';
    }
}
