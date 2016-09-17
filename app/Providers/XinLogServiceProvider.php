<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\XinLogService;
//use App\Facades\Test;

class XinLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('xinlog',function(){
            return new XinLogService();
        });

        $this->app->bind('App\Contracts\TestContract',function(){
            return new TestService();
        });
    }
}